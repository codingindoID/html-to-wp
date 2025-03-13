<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/services/recommendation_service.proto

namespace Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Parameters to use when applying sitelink asset recommendations.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.services.ApplyRecommendationOperation.SitelinkAssetParameters</code>
 */
class SitelinkAssetParameters extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Sitelink assets to be added. This is a required field.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.services.ApplyRecommendationOperation.AdAssetApplyParameters ad_asset_apply_parameters = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $ad_asset_apply_parameters = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation\AdAssetApplyParameters $ad_asset_apply_parameters
     *           Required. Sitelink assets to be added. This is a required field.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Services\RecommendationService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Sitelink assets to be added. This is a required field.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.services.ApplyRecommendationOperation.AdAssetApplyParameters ad_asset_apply_parameters = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation\AdAssetApplyParameters|null
     */
    public function getAdAssetApplyParameters()
    {
        return $this->ad_asset_apply_parameters;
    }

    public function hasAdAssetApplyParameters()
    {
        return isset($this->ad_asset_apply_parameters);
    }

    public function clearAdAssetApplyParameters()
    {
        unset($this->ad_asset_apply_parameters);
    }

    /**
     * Required. Sitelink assets to be added. This is a required field.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v18.services.ApplyRecommendationOperation.AdAssetApplyParameters ad_asset_apply_parameters = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation\AdAssetApplyParameters $var
     * @return $this
     */
    public function setAdAssetApplyParameters($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation\AdAssetApplyParameters::class);
        $this->ad_asset_apply_parameters = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SitelinkAssetParameters::class, \Google\Ads\GoogleAds\V18\Services\ApplyRecommendationOperation_SitelinkAssetParameters::class);

