<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Event/ParticipantPayment.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:faf8b6394f4e57dd2bd6702f712f7157)
 */

/**
 * Database access object for the ParticipantPayment entity.
 */
class CRM_Event_DAO_ParticipantPayment extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '1.7';
  const COMPONENT = 'CiviEvent';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_participant_payment';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = TRUE;

  /**
   * Participant Payment ID
   *
   * @var int
   */
  public $id;

  /**
   * Participant ID (FK)
   *
   * @var int
   */
  public $participant_id;

  /**
   * FK to contribution table.
   *
   * @var int
   */
  public $contribution_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_participant_payment';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Participant Payments') : ts('Participant Payment');
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'participant_id', 'civicrm_participant', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'contribution_id', 'civicrm_contribution', 'id');
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
          'title' => ts('Payment ID'),
          'description' => ts('Participant Payment ID'),
          'required' => TRUE,
          'where' => 'civicrm_participant_payment.id',
          'table_name' => 'civicrm_participant_payment',
          'entity' => 'ParticipantPayment',
          'bao' => 'CRM_Event_BAO_ParticipantPayment',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '1.7',
        ],
        'participant_id' => [
          'name' => 'participant_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Participant ID'),
          'description' => ts('Participant ID (FK)'),
          'required' => TRUE,
          'where' => 'civicrm_participant_payment.participant_id',
          'table_name' => 'civicrm_participant_payment',
          'entity' => 'ParticipantPayment',
          'bao' => 'CRM_Event_BAO_ParticipantPayment',
          'localizable' => 0,
          'FKClassName' => 'CRM_Event_DAO_Participant',
          'html' => [
            'label' => ts("Participant"),
          ],
          'add' => '1.7',
        ],
        'contribution_id' => [
          'name' => 'contribution_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Contribution ID'),
          'description' => ts('FK to contribution table.'),
          'required' => TRUE,
          'where' => 'civicrm_participant_payment.contribution_id',
          'table_name' => 'civicrm_participant_payment',
          'entity' => 'ParticipantPayment',
          'bao' => 'CRM_Event_BAO_ParticipantPayment',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contribute_DAO_Contribution',
          'html' => [
            'label' => ts("Contribution"),
          ],
          'add' => '2.0',
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'participant_payment', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'participant_payment', $prefix, []);
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
    $indices = [
      'UI_contribution_participant' => [
        'name' => 'UI_contribution_participant',
        'field' => [
          0 => 'contribution_id',
          1 => 'participant_id',
        ],
        'localizable' => FALSE,
        'unique' => TRUE,
        'sig' => 'civicrm_participant_payment::1::contribution_id::participant_id',
      ],
    ];
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }

}
