<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/campaign.proto

namespace Google\Ads\GoogleAds\V18\Resources\Campaign;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Information about a campaign being upgraded to Performance Max.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.Campaign.PerformanceMaxUpgrade</code>
 */
class PerformanceMaxUpgrade extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name of the Performance Max campaign the
     * campaign is upgraded to.
     *
     * Generated from protobuf field <code>string performance_max_campaign = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $performance_max_campaign = '';
    /**
     * Output only. The resource name of the legacy campaign upgraded to
     * Performance Max.
     *
     * Generated from protobuf field <code>string pre_upgrade_campaign = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    protected $pre_upgrade_campaign = '';
    /**
     * Output only. The upgrade status of a campaign requested to be upgraded to
     * Performance Max.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.enums.PerformanceMaxUpgradeStatusEnum.PerformanceMaxUpgradeStatus status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $status = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $performance_max_campaign
     *           Output only. The resource name of the Performance Max campaign the
     *           campaign is upgraded to.
     *     @type string $pre_upgrade_campaign
     *           Output only. The resource name of the legacy campaign upgraded to
     *           Performance Max.
     *     @type int $status
     *           Output only. The upgrade status of a campaign requested to be upgraded to
     *           Performance Max.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\Campaign::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name of the Performance Max campaign the
     * campaign is upgraded to.
     *
     * Generated from protobuf field <code>string performance_max_campaign = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getPerformanceMaxCampaign()
    {
        return $this->performance_max_campaign;
    }

    /**
     * Output only. The resource name of the Performance Max campaign the
     * campaign is upgraded to.
     *
     * Generated from protobuf field <code>string performance_max_campaign = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setPerformanceMaxCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->performance_max_campaign = $var;

        return $this;
    }

    /**
     * Output only. The resource name of the legacy campaign upgraded to
     * Performance Max.
     *
     * Generated from protobuf field <code>string pre_upgrade_campaign = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getPreUpgradeCampaign()
    {
        return $this->pre_upgrade_campaign;
    }

    /**
     * Output only. The resource name of the legacy campaign upgraded to
     * Performance Max.
     *
     * Generated from protobuf field <code>string pre_upgrade_campaign = 2 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setPreUpgradeCampaign($var)
    {
        GPBUtil::checkString($var, True);
        $this->pre_upgrade_campaign = $var;

        return $this;
    }

    /**
     * Output only. The upgrade status of a campaign requested to be upgraded to
     * Performance Max.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.enums.PerformanceMaxUpgradeStatusEnum.PerformanceMaxUpgradeStatus status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Output only. The upgrade status of a campaign requested to be upgraded to
     * Performance Max.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.enums.PerformanceMaxUpgradeStatusEnum.PerformanceMaxUpgradeStatus status = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V18\Enums\PerformanceMaxUpgradeStatusEnum\PerformanceMaxUpgradeStatus::class);
        $this->status = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerformanceMaxUpgrade::class, \Google\Ads\GoogleAds\V18\Resources\Campaign_PerformanceMaxUpgrade::class);

