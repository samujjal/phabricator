<?php

/**
 * A purchase represents a user buying something or a subscription to a plan.
 */
final class PhortunePurchase extends PhortuneDAO {

  const STATUS_PROCESSING   = 'purchase:processing';
  const STATUS_ACTIVE       = 'purchase:active';
  const STATUS_CANCELED     = 'purchase:canceled';
  const STATUS_DELIVERED    = 'purchase:delivered';
  const STATUS_FAILED       = 'purchase:failed';

  protected $productPHID;
  protected $accountPHID;
  protected $authorPHID;
  protected $paymentMethodPHID;
  protected $quantity;
  protected $status;

  public function getConfiguration() {
    return array(
      self::CONFIG_AUX_PHID => true,
      self::CONFIG_SERIALIZATION => array(
        'metadata' => self::SERIALIZATION_JSON,
      ),
    ) + parent::getConfiguration();
  }

  public function generatePHID() {
    return PhabricatorPHID::generateNewPHID(
      PhabricatorPHIDConstants::PHID_TYPE_PRCH);
  }

}
