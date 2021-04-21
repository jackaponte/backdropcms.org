<?php

require_once 'afform.civix.php';
use CRM_Afform_ExtensionUtil as E;
use Civi\Api4\Action\Afform\Submit;

/**
 * Filter the content of $params to only have supported afform fields.
 *
 * @param array $params
 * @return array
 */
function _afform_fields_filter($params) {
  $result = [];
  $fields = \Civi\Api4\Afform::getfields()->setCheckPermissions(FALSE)->setAction('create')->execute()->indexBy('name');
  foreach ($fields as $fieldName => $field) {
    if (isset($params[$fieldName])) {
      $result[$fieldName] = $params[$fieldName];

      if ($field['data_type'] === 'Boolean' && !is_bool($params[$fieldName])) {
        $result[$fieldName] = CRM_Utils_String::strtobool($params[$fieldName]);
      }
    }
  }
  return $result;
}

/**
 * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
 */
function afform_civicrm_container($container) {
  $container->addResource(new \Symfony\Component\Config\Resource\FileResource(__FILE__));
  $container->setDefinition('afform_scanner', new \Symfony\Component\DependencyInjection\Definition(
    'CRM_Afform_AfformScanner',
    []
  ))->setPublic(TRUE);
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function afform_civicrm_config(&$config) {
  _afform_civix_civicrm_config($config);

  if (isset(Civi::$statics[__FUNCTION__])) {
    return;
  }
  Civi::$statics[__FUNCTION__] = 1;

  Civi::dispatcher()->addListener(Submit::EVENT_NAME, [Submit::class, 'processContacts'], 500);
  Civi::dispatcher()->addListener(Submit::EVENT_NAME, [Submit::class, 'processGenericEntity'], -1000);
  Civi::dispatcher()->addListener('hook_civicrm_angularModules', ['\Civi\Afform\AngularDependencyMapper', 'autoReq'], -1000);
  Civi::dispatcher()->addListener('hook_civicrm_alterAngular', ['\Civi\Afform\AfformMetadataInjector', 'preprocess']);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function afform_civicrm_xmlMenu(&$files) {
  _afform_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function afform_civicrm_install() {
  _afform_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function afform_civicrm_postInstall() {
  _afform_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function afform_civicrm_uninstall() {
  _afform_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function afform_civicrm_enable() {
  _afform_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function afform_civicrm_disable() {
  _afform_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function afform_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _afform_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function afform_civicrm_managed(&$entities) {
  _afform_civix_civicrm_managed($entities);

  /** @var \CRM_Afform_AfformScanner $scanner */
  if (\Civi::container()->has('afform_scanner')) {
    $scanner = \Civi::service('afform_scanner');
  }
  else {
    // This might happen at oddballs points - e.g. while you're in the middle of re-enabling the ext.
    // This AfformScanner instance only lives during this method call, and it feeds off the regular cache.
    $scanner = new CRM_Afform_AfformScanner();
  }

  foreach ($scanner->getMetas() as $afform) {
    if (empty($afform['is_dashlet']) || empty($afform['name'])) {
      continue;
    }
    $entities[] = [
      'module' => E::LONG_NAME,
      'name' => 'afform_dashlet_' . $afform['name'],
      'entity' => 'Dashboard',
      'update' => 'always',
      // ideal cleanup policy might be to (a) deactivate if used and (b) remove if unused
      'cleanup' => 'always',
      'params' => [
        'version' => 3,
        // Q: Should we loop through all domains?
        'domain_id' => CRM_Core_BAO_Domain::getDomain()->id,
        'is_active' => TRUE,
        'name' => $afform['name'],
        'label' => $afform['title'] ?? ts('(Untitled)'),
        'directive' => _afform_angular_module_name($afform['name'], 'dash'),
        'permission' => "@afform:" . $afform['name'],
      ],
    ];
  }
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function afform_civicrm_caseTypes(&$caseTypes) {
  _afform_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Afform Angular modules.
 */
function afform_civicrm_angularModules(&$angularModules) {
  _afform_civix_civicrm_angularModules($angularModules);

  $afforms = \Civi\Api4\Afform::get(FALSE)
    ->setSelect(['name', 'requires', 'module_name', 'directive_name'])
    ->execute();

  foreach ($afforms as $afform) {
    $angularModules[$afform['module_name']] = [
      'ext' => E::LONG_NAME,
      'js' => ['assetBuilder://afform.js?name=' . urlencode($afform['name'])],
      'requires' => $afform['requires'],
      'basePages' => [],
      'partialsCallback' => '_afform_get_partials',
      '_afform' => $afform['name'],
      // TODO: Allow afforms to declare their own theming requirements
      'bundles' => ['bootstrap3'],
      'exports' => [
        $afform['directive_name'] => 'E',
      ],
    ];
  }
}

/**
 * Callback to retrieve partials for a given afform/angular module.
 *
 * @see afform_civicrm_angularModules
 *
 * @param string $moduleName
 *   The module name.
 * @param array $module
 *   The module definition.
 * @return array
 *   Array(string $filename => string $html).
 * @throws API_Exception
 */
function _afform_get_partials($moduleName, $module) {
  $afform = civicrm_api4('Afform', 'get', [
    'where' => [['name', '=', $module['_afform']]],
    'select' => ['layout'],
    'layoutFormat' => 'html',
    'checkPermissions' => FALSE,
  ], 0);
  return [
    "~/$moduleName/$moduleName.aff.html" => $afform['layout'],
  ];
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function afform_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _afform_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function afform_civicrm_entityTypes(&$entityTypes) {
  _afform_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function afform_civicrm_themes(&$themes) {
  _afform_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_buildAsset().
 */
function afform_civicrm_buildAsset($asset, $params, &$mimeType, &$content) {
  if ($asset !== 'afform.js') {
    return;
  }

  if (empty($params['name'])) {
    throw new RuntimeException("Missing required parameter: afform.js?name=NAME");
  }

  $moduleName = _afform_angular_module_name($params['name'], 'camel');
  $smarty = CRM_Core_Smarty::singleton();
  $smarty->assign('afform', [
    'camel' => $moduleName,
    'meta' => ['name' => $params['name']],
    'templateUrl' => "~/$moduleName/$moduleName.aff.html",
  ]);
  $mimeType = 'text/javascript';
  $content = $smarty->fetch('afform/AfformAngularModule.tpl');
}

/**
 * Implements hook_civicrm_alterMenu().
 */
function afform_civicrm_alterMenu(&$items) {
  if (Civi::container()->has('afform_scanner')) {
    $scanner = Civi::service('afform_scanner');
  }
  else {
    // During installation...
    $scanner = new CRM_Afform_AfformScanner();
  }
  foreach ($scanner->getMetas() as $name => $meta) {
    if (!empty($meta['server_route'])) {
      $items[$meta['server_route']] = [
        'page_callback' => 'CRM_Afform_Page_AfformBase',
        'page_arguments' => 'afform=' . urlencode($name),
        'title' => $meta['title'] ?? '',
        'access_arguments' => [["@afform:$name"], 'and'],
        'is_public' => $meta['is_public'],
      ];
    }
  }
}

/**
 * Implements hook_civicrm_permission_check().
 *
 * This extends the list of permissions available in `CRM_Core_Permission:check()`
 * by introducing virtual-permissions named `@afform:myForm`. The evaluation
 * of these virtual-permissions is dependent on the settings for `myForm`.
 * `myForm` may be exposed/integrated through multiple subsystems (routing,
 * nav-menu, API, etc), and the use of virtual-permissions makes easy to enforce
 * consistent permissions across any relevant subsystems.
 *
 * @see CRM_Utils_Hook::permission_check()
 */
function afform_civicrm_permission_check($permission, &$granted, $contactId) {
  if ($permission[0] !== '@') {
    // Micro-optimization - this function may get hit a lot.
    return;
  }

  if (preg_match('/^@afform:(.*)/', $permission, $m)) {
    $name = $m[1];

    $afform = \Civi\Api4\Afform::get()
      ->setCheckPermissions(FALSE)
      ->addWhere('name', '=', $name)
      ->setSelect(['permission'])
      ->execute()
      ->first();
    if ($afform) {
      $granted = CRM_Core_Permission::check($afform['permission'], $contactId);
    }
  }
}

/**
 * Implements hook_civicrm_permissionList().
 *
 * @see CRM_Utils_Hook::permissionList()
 */
function afform_civicrm_permissionList(&$permissions) {
  $scanner = Civi::service('afform_scanner');
  foreach ($scanner->getMetas() as $name => $meta) {
    $permissions['@afform:' . $name] = [
      'group' => 'afform',
      'title' => ts('Afform: Inherit permission of %1', [
        1 => $name,
      ]),
    ];
  }
}

/**
 * Clear any local/in-memory caches based on afform data.
 */
function _afform_clear() {
  $container = \Civi::container();
  $container->get('afform_scanner')->clear();
  $container->get('angular')->clear();
}

/**
 * @param string $fileBaseName
 *   Ex: foo-bar
 * @param string $format
 *   'camel' or 'dash'.
 * @return string
 *   Ex: 'FooBar' or 'foo-bar'.
 * @throws \Exception
 */
function _afform_angular_module_name($fileBaseName, $format = 'camel') {
  switch ($format) {
    case 'camel':
      $camelCase = '';
      foreach (preg_split('/[-_ ]/', $fileBaseName, NULL, PREG_SPLIT_NO_EMPTY) as $shortNamePart) {
        $camelCase .= ucfirst($shortNamePart);
      }
      return strtolower($camelCase[0]) . substr($camelCase, 1);

    case 'dash':
      return strtolower(implode('-', preg_split('/[-_ ]|(?=[A-Z])/', $fileBaseName, NULL, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE)));

    default:
      throw new \Exception("Unrecognized format");
  }
}

/**
 * Implements hook_civicrm_alterApiRoutePermissions().
 *
 * @see CRM_Utils_Hook::alterApiRoutePermissions
 */
function afform_civicrm_alterApiRoutePermissions(&$permissions, $entity, $action) {
  if ($entity == 'Afform') {
    if ($action == 'prefill' || $action == 'submit') {
      $permissions = CRM_Core_Permission::ALWAYS_ALLOW_PERMISSION;
    }
  }
}
