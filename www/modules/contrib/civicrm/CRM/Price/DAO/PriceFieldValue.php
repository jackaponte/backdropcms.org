<?php

/**
 * @package CRM
 * @copyright CiviCRM LLC https://civicrm.org/licensing
 *
 * Generated from xml/schema/CRM/Price/PriceFieldValue.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:7da3309222cffae75ba3d149e8acb395)
 */

/**
 * Database access object for the PriceFieldValue entity.
 */
class CRM_Price_DAO_PriceFieldValue extends CRM_Core_DAO {
  const EXT = 'civicrm';
  const TABLE_ADDED = '3.3';
  const COMPONENT = 'CiviContribute';

  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  public static $_tableName = 'civicrm_price_field_value';

  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var bool
   */
  public static $_log = FALSE;

  /**
   * Price Field Value
   *
   * @var int
   */
  public $id;

  /**
   * FK to civicrm_price_field
   *
   * @var int
   */
  public $price_field_id;

  /**
   * Price field option name
   *
   * @var string
   */
  public $name;

  /**
   * Price field option label
   *
   * @var string
   */
  public $label;

  /**
   * Price field option description.
   *
   * @var text
   */
  public $description;

  /**
   * Price field option pre help text.
   *
   * @var text
   */
  public $help_pre;

  /**
   * Price field option post field help.
   *
   * @var text
   */
  public $help_post;

  /**
   * Price field option amount
   *
   * @var float
   */
  public $amount;

  /**
   * Number of participants per field option
   *
   * @var int
   */
  public $count;

  /**
   * Max number of participants per field options
   *
   * @var int
   */
  public $max_value;

  /**
   * Order in which the field options should appear
   *
   * @var int
   */
  public $weight;

  /**
   * FK to Membership Type
   *
   * @var int
   */
  public $membership_type_id;

  /**
   * Number of terms for this membership
   *
   * @var int
   */
  public $membership_num_terms;

  /**
   * Is this default price field option
   *
   * @var bool
   */
  public $is_default;

  /**
   * Is this price field value active
   *
   * @var bool
   */
  public $is_active;

  /**
   * FK to Financial Type.
   *
   * @var int
   */
  public $financial_type_id;

  /**
   * Portion of total amount which is NOT tax deductible.
   *
   * @var float
   */
  public $non_deductible_amount;

  /**
   * Implicit FK to civicrm_option_group with name = 'visibility'
   *
   * @var int
   */
  public $visibility_id;

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->__table = 'civicrm_price_field_value';
    parent::__construct();
  }

  /**
   * Returns localized title of this entity.
   *
   * @param bool $plural
   *   Whether to return the plural version of the title.
   */
  public static function getEntityTitle($plural = FALSE) {
    return $plural ? ts('Price Field Values') : ts('Price Field Value');
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
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'price_field_id', 'civicrm_price_field', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'membership_type_id', 'civicrm_membership_type', 'id');
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName(), 'financial_type_id', 'civicrm_financial_type', 'id');
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
          'title' => ts('Price Field Value ID'),
          'description' => ts('Price Field Value'),
          'required' => TRUE,
          'where' => 'civicrm_price_field_value.id',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Number',
          ],
          'readonly' => TRUE,
          'add' => '3.3',
        ],
        'price_field_id' => [
          'name' => 'price_field_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Price Field ID'),
          'description' => ts('FK to civicrm_price_field'),
          'required' => TRUE,
          'where' => 'civicrm_price_field_value.price_field_id',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Price_DAO_PriceField',
          'html' => [
            'label' => ts("Price Field"),
          ],
          'add' => '3.3',
        ],
        'name' => [
          'name' => 'name',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Name'),
          'description' => ts('Price field option name'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_price_field_value.name',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.3',
        ],
        'label' => [
          'name' => 'label',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Label'),
          'description' => ts('Price field option label'),
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'where' => 'civicrm_price_field_value.label',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 1,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.3',
        ],
        'description' => [
          'name' => 'description',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Description'),
          'description' => ts('Price field option description.'),
          'rows' => 2,
          'cols' => 60,
          'where' => 'civicrm_price_field_value.description',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 1,
          'html' => [
            'type' => 'TextArea',
            'label' => ts("Description"),
          ],
          'add' => '3.3',
        ],
        'help_pre' => [
          'name' => 'help_pre',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Help Pre'),
          'description' => ts('Price field option pre help text.'),
          'rows' => 2,
          'cols' => 60,
          'where' => 'civicrm_price_field_value.help_pre',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 1,
          'html' => [
            'type' => 'TextArea',
            'label' => ts("Pre Help"),
          ],
          'add' => '4.7',
        ],
        'help_post' => [
          'name' => 'help_post',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Help Post'),
          'description' => ts('Price field option post field help.'),
          'rows' => 2,
          'cols' => 60,
          'where' => 'civicrm_price_field_value.help_post',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 1,
          'html' => [
            'type' => 'TextArea',
            'label' => ts("Post Help"),
          ],
          'add' => '4.7',
        ],
        'amount' => [
          'name' => 'amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Amount'),
          'description' => ts('Price field option amount'),
          'required' => TRUE,
          'precision' => [
            18,
            9,
          ],
          'where' => 'civicrm_price_field_value.amount',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.3',
        ],
        'count' => [
          'name' => 'count',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Count'),
          'description' => ts('Number of participants per field option'),
          'where' => 'civicrm_price_field_value.count',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
            'label' => ts("Count"),
          ],
          'add' => '3.3',
        ],
        'max_value' => [
          'name' => 'max_value',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Max Value'),
          'description' => ts('Max number of participants per field options'),
          'where' => 'civicrm_price_field_value.max_value',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
            'label' => ts("Max Value"),
          ],
          'add' => '3.3',
        ],
        'weight' => [
          'name' => 'weight',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Order'),
          'description' => ts('Order in which the field options should appear'),
          'where' => 'civicrm_price_field_value.weight',
          'default' => '1',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '3.3',
        ],
        'membership_type_id' => [
          'name' => 'membership_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Type ID'),
          'description' => ts('FK to Membership Type'),
          'where' => 'civicrm_price_field_value.membership_type_id',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Member_DAO_MembershipType',
          'html' => [
            'type' => 'Select',
            'label' => ts("Membership Type"),
          ],
          'add' => '3.4',
        ],
        'membership_num_terms' => [
          'name' => 'membership_num_terms',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Membership Num Terms'),
          'description' => ts('Number of terms for this membership'),
          'where' => 'civicrm_price_field_value.membership_num_terms',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
            'label' => ts("Number of terms"),
          ],
          'add' => '4.3',
        ],
        'is_default' => [
          'name' => 'is_default',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Default Price Field Option?'),
          'description' => ts('Is this default price field option'),
          'where' => 'civicrm_price_field_value.is_default',
          'default' => '0',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'CheckBox',
          ],
          'add' => '3.3',
        ],
        'is_active' => [
          'name' => 'is_active',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Price Field Value is Active'),
          'description' => ts('Is this price field value active'),
          'where' => 'civicrm_price_field_value.is_active',
          'default' => '1',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'add' => '3.3',
        ],
        'financial_type_id' => [
          'name' => 'financial_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Financial Type ID'),
          'description' => ts('FK to Financial Type.'),
          'where' => 'civicrm_price_field_value.financial_type_id',
          'default' => NULL,
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'FKClassName' => 'CRM_Financial_DAO_FinancialType',
          'html' => [
            'type' => 'Select',
            'label' => ts("Financial Type"),
          ],
          'pseudoconstant' => [
            'table' => 'civicrm_financial_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          ],
          'add' => '4.3',
        ],
        'non_deductible_amount' => [
          'name' => 'non_deductible_amount',
          'type' => CRM_Utils_Type::T_MONEY,
          'title' => ts('Non-deductible Amount'),
          'description' => ts('Portion of total amount which is NOT tax deductible.'),
          'required' => TRUE,
          'precision' => [
            20,
            2,
          ],
          'where' => 'civicrm_price_field_value.non_deductible_amount',
          'headerPattern' => '/non?.?deduct/i',
          'dataPattern' => '/^\d+(\.\d{2})?$/',
          'default' => '0.0',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Text',
          ],
          'add' => '4.7',
        ],
        'visibility_id' => [
          'name' => 'visibility_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Price Field Option Visibility'),
          'description' => ts('Implicit FK to civicrm_option_group with name = \'visibility\''),
          'where' => 'civicrm_price_field_value.visibility_id',
          'default' => '1',
          'table_name' => 'civicrm_price_field_value',
          'entity' => 'PriceFieldValue',
          'bao' => 'CRM_Price_BAO_PriceFieldValue',
          'localizable' => 0,
          'html' => [
            'type' => 'Select',
          ],
          'pseudoconstant' => [
            'optionGroupName' => 'visibility',
            'optionEditPath' => 'civicrm/admin/options/visibility',
          ],
          'add' => '4.7',
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
    return CRM_Core_DAO::getLocaleTableName(self::$_tableName);
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
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'price_field_value', $prefix, []);
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
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'price_field_value', $prefix, []);
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