<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Core/MappingField.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:7b6fef105fbd75f712c39395b4dec8a9)
 */

/**
 * Database access object for the MappingField entity.
 */
class CRM_Core_DAO_MappingField extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.2';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_mapping_field';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * Mapping Field ID
   *
   * @var int
   */
  public $id;

  /**
   * Mapping to which this field belongs
   *
   * @var int
   */
  public $mapping_id;

  /**
   * Mapping field key
   *
   * @var string
   */
  public $name;

  /**
   * Contact Type in mapping
   *
   * @var string
   */
  public $contact_type;

  /**
   * Column number for mapping set
   *
   * @var int
   */
  public $column_number;

  /**
   * Location type of this mapping, if required
   *
   * @var int
   */
  public $location_type_id;

  /**
   * Which type of phone does this number belongs.
   *
   * @var int
   */
  public $phone_type_id;

  /**
   * Which type of IM Provider does this name belong.
   *
   * @var int
   */
  public $im_provider_id;

  /**
   * Which type of website does this site belong
   *
   * @var int
   */
  public $website_type_id;

  /**
   * Relationship type, if required
   *
   * @var int
   */
  public $relationship_type_id;

  /**
   * @var string
   */
  public $relationship_direction;

  /**
   * Used to group mapping_field records into related sets (e.g. for criteria sets in search builder
   * mappings).
   *
   * @var int
   */
  public $grouping;

  /**
   * SQL WHERE operator for search-builder mapping fields (search criteria).
   *
   * @var string
   */
  public $operator;

  /**
   * SQL WHERE value for search-builder mapping fields.
   *
   * @var string
   */
  public $value;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_mapping_field';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Mapping Fields') : ts('Mapping Field');
  }

  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  public static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'mapping_id', 'civicrm_mapping', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'location_type_id', 'civicrm_location_type', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'relationship_type_id', 'civicrm_relationship_type', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }

  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  public static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = [
        'id' => [
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Mapping Field ID'),
          'description' => ts('Mapping Field ID'),
          'required' => TRUE,
          'where' => 'civicrm_mapping_field.id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '1.2',
        ],
        'mapping_id' => [
          'name' => 'mapping_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Mapping ID'),
          'description' => ts('Mapping to which this field belongs'),
          'required' => TRUE,
          'where' => 'civicrm_mapping_field.mapping_id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_Mapping',
          'html' => [
            'label' => ts("Mapping"),
          ],
          'add' => '1.2',
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Field Name (or unique reference)'),
          'description' => ts('Mapping field key'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_mapping_field.name',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'add' => '1.2',
        ],
        'contact_type' => [
          'name' => 'contact_type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Contact Type'),
          'description' => ts('Contact Type in mapping'),
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'where' => 'civicrm_mapping_field.contact_type',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'add' => '1.2',
        ],
        'column_number' => [
          'name' => 'column_number',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Column Number to map to'),
          'description' => ts('Column number for mapping set'),
          'required' => TRUE,
          'where' => 'civicrm_mapping_field.column_number',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'add' => '1.2',
        ],
        'location_type_id' => [
          'name' => 'location_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Location type ID'),
          'description' => ts('Location type of this mapping, if required'),
          'where' => 'civicrm_mapping_field.location_type_id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'FKClassName' => 'CRM_Core_DAO_LocationType',
          'html' => [
            'label' => ts("Location type"),
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_location_type',
            'keyColumn' => 'id',
            'labelColumn' => 'display_name',
          ],
          'add' => '1.2',
        ],
        'phone_type_id' => [
          'name' => 'phone_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Phone type ID'),
          'description' => ts('Which type of phone does this number belongs.'),
          'where' => 'civicrm_mapping_field.phone_type_id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'add' => '2.2',
        ],
        'im_provider_id' => [
          'name' => 'im_provider_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('IM provider ID'),
          'description' => ts('Which type of IM Provider does this name belong.'),
          'where' => 'civicrm_mapping_field.im_provider_id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'instant_messenger_service',
            'optionEditPath' => 'civicrm/admin/options/instant_messenger_service',
          ],
          'add' => '3.0',
        ],
        'website_type_id' => [
          'name' => 'website_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Website type ID'),
          'description' => ts('Which type of website does this site belong'),
          'where' => 'civicrm_mapping_field.website_type_id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'website_type',
            'optionEditPath' => 'civicrm/admin/options/website_type',
          ],
          'add' => '3.2',
        ],
        'relationship_type_id' => [
          'name' => 'relationship_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Relationship type ID'),
          'description' => ts('Relationship type, if required'),
          'where' => 'civicrm_mapping_field.relationship_type_id',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contact_DAO_RelationshipType',
          'html' => [
            'label' => ts("Relationship type"),
          ],
          'add' => '1.2',
        ],
        'relationship_direction' => [
          'name' => 'relationship_direction',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Relationship Direction'),
          'maxlength' => 6,
          'size' => CRM_Utils_Type::SIX,
          'where' => 'civicrm_mapping_field.relationship_direction',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'add' => '1.7',
        ],
        'grouping' => [
          'name' => 'grouping',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Field Grouping'),
          'description' => ts('Used to group mapping_field records into related sets (e.g. for criteria sets in search builder
      mappings).'),
          'where' => 'civicrm_mapping_field.grouping',
          'default' => '1',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'add' => '1.5',
        ],
        'operator' => [
          'name' => 'operator',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Operator'),
          'description' => ts('SQL WHERE operator for search-builder mapping fields (search criteria).'),
          'maxlength' => 16,
          'size' => CRM_Utils_Type::TWELVE,
          'where' => 'civicrm_mapping_field.operator',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'callback' => 'CRM_Core_SelectValues::getSearchBuilderOperators',
          ],
          'add' => '1.5',
        ],
        'value' => [
          'name' => 'value',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Search builder where clause'),
          'description' => ts('SQL WHERE value for search-builder mapping fields.'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_mapping_field.value',
          'table_name' => 'civicrm_mapping_field',
          'entity' => 'MappingField',
          'bao' => 'CRM_Core_DAO_MappingField',
          'localizable' => 0,
          'add' => '1.5',
        ],
      ];
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }

  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  public static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }

  /**
   * Returns the names of this table
   *
   * @return string
   */
  public static function getTableName() {
    return self::$_tableName;
  }

  /**
   * Returns if this table needs to be logged
   *
   * @return bool
   */
  public function getLog() {
    return self::$_log;
  }

  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &import($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'mapping_field', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  public static function &export($prefix = FALSE) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'mapping_field', $prefix, []);
    return $r;
  }

  /**
   * Returns the list of indices
   *
   * @param bool $localize
   *
   * @return array
   */
  public static function indices($localize = TRUE) {
    $indices = [];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
