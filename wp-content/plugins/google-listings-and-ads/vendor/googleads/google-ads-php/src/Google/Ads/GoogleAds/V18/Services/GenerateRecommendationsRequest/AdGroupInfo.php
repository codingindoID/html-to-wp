<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/services/recommendation_service.proto

namespace Google\Ads\GoogleAds\V18\Services\GenerateRecommendationsRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Current AdGroup Information of the campaign.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.services.GenerateRecommendationsRequest.AdGroupInfo</code>
 */
class AdGroupInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. AdGroup Type of the AdGroup.
     * This field is necessary for the following recommendation_types if
     * ad_group_info is set:
     * KEYWORD
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v18.enums.AdGroupTypeEnum.AdGroupType ad_group_type = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    protected $ad_group_type = null;
    /**
     * Optional. Current keywords.
     * This field is optional for the following recommendation_types if
     * ad_group_info is set:
     * KEYWORD
     * This field is required for the following recommendation_types:
     * CAMPAIGN_BUDGET if AdvertisingChannelType is SEARCH
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.KeywordInfo keywords = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $keywords;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $ad_group_type
     *           Optional. AdGroup Type of the AdGroup.
     *           This field is necessary for the following recommendation_types if
     *           ad_group_info is set:
     *           KEYWORD
     *     @type array<\Google\Ads\GoogleAds\V18\Common\KeywordInfo>|\Google\Protobuf\Internal\RepeatedField $keywords
     *           Optional. Current keywords.
     *           This field is optional for the following recommendation_types if
     *           ad_group_info is set:
     *           KEYWORD
     *           This field is required for the following recommendation_types:
     *           CAMPAIGN_BUDGET if AdvertisingChannelType is SEARCH
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Services\RecommendationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. AdGroup Type of the AdGroup.
     * This field is necessary for the following recommendation_types if
     * ad_group_info is set:
     * KEYWORD
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v18.enums.AdGroupTypeEnum.AdGroupType ad_group_type = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getAdGroupType()
    {
        return isset($this->ad_group_type) ? $this->ad_group_type : 0;
    }

    public function hasAdGroupType()
    {
        return isset($this->ad_group_type);
    }

    public function clearAdGroupType()
    {
        unset($this->ad_group_type);
    }

    /**
     * Optional. AdGroup Type of the AdGroup.
     * This field is necessary for the following recommendation_types if
     * ad_group_info is set:
     * KEYWORD
     *
     * Generated from protobuf field <code>optional .google.ads.googleads.v18.enums.AdGroupTypeEnum.AdGroupType ad_group_type = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setAdGroupType($var)
    {
        GPBUtil::checkEnum($var, \Google\Ads\GoogleAds\V18\Enums\AdGroupTypeEnum\AdGroupType::class);
        $this->ad_group_type = $var;

        return $this;
    }

    /**
     * Optional. Current keywords.
     * This field is optional for the following recommendation_types if
     * ad_group_info is set:
     * KEYWORD
     * This field is required for the following recommendation_types:
     * CAMPAIGN_BUDGET if AdvertisingChannelType is SEARCH
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.KeywordInfo keywords = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Optional. Current keywords.
     * This field is optional for the following recommendation_types if
     * ad_group_info is set:
     * KEYWORD
     * This field is required for the following recommendation_types:
     * CAMPAIGN_BUDGET if AdvertisingChannelType is SEARCH
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.common.KeywordInfo keywords = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Ads\GoogleAds\V18\Common\KeywordInfo>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setKeywords($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V18\Common\KeywordInfo::class);
        $this->keywords = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdGroupInfo::class, \Google\Ads\GoogleAds\V18\Services\GenerateRecommendationsRequest_AdGroupInfo::class);

