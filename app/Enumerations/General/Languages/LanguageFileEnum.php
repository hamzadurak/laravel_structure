<?php

namespace App\Enumerations\General\Languages;

abstract class LanguageFileEnum
{
    const HTTP_STATUS = 'global/http-status';
    const USER = 'user/user';
    const STATUS = 'global/status';
    const AUTH = 'auth';
    const ROUTE_GROUP_PERMISSION_NAMES = 'user/relations/permission/route-group-permission-names';
    const PERMISSIONS = 'user/relations/permission/permissions';
    const EXCEPTION = 'global/exception';
    const HISTORY = 'history/history';
    const HISTORY_ACTION = 'history/history-action';
    const GENERAL_SETTINGS = 'general-settings/general-settings';
    const GENERAL_SETTINGS_TYPES = 'general-settings/general-settings-types';
    const CART_STATUS = 'cart/cart-status';
    const PARACHUTE_STATUS = 'parachute/status';
    const PARACHUTE_API_STATUS = 'parachute/api-status';
    const API_TITLES = 'api/api-title';
    const API_CASE = 'api/api-case';
    const API_LABEL = 'api/api-label';
    const TOKEN = 'token/jwt';
    const AUTHORIZATION_PRODUCT = 'user/authorization-product';
    const ROLE_INTERFACE_TYPES = 'user/relations/role/role-interface-types';
    const CURRENCY = 'currency/currency';
    const SERVER_IMAGE_STATUS = 'server-image/server-image-status';
    const SERVER_IMAGE_TYPES = 'server-image/server-image-types';
    const MAIL_BLACKLIST = 'mail-blacklist/mail-blacklist';
    const MESSAGES = 'messages/messages';
    const SITE_SCRIPT_PREDEFINED = 'site-script/site-script-predefined';
    const SITE_SCRIPT_POSITIONS = 'site-script/site-script-positions';
    const COMMENT_STATUS = 'comment/comment-status';
    const COMMENT = 'comment/comment';
    const WHITELIST_TITLE = 'whitelist/whitelist-title';
    const MODEL_TITLE = 'model/models';
    const BANK_NOTIFICATION_STATUS = 'bank-notification/status';
    const USERS_ON_BREAK = 'users-on-break/break-types';
    const SITE_W3_SCAN = 'site-w3-scan/site-w3-scan';
    const PAYTR_TRY_CONNECTION = 'paytr-try-connection/error';
    const PAYTR_TRY_CONNECTION_QUERY = 'paytr-try-connection/query-type';
    const GUARANTEE_COUNT = 'guarantee-count/guarantee-count';
    const IMAGE_TYPES = 'social-media/relations/social-media-type/image-types/image-types';
    const API_STATUSES = 'social-media/relations/social-media-type/api-statuses/api-statuses';
    const LINK_STATUSES = 'social-media/relations/social-media-type/link-statuses/link-statuses';
    const USER_AGENT = 'user-agent/user-agent';
    const PRODUCT_SELECTION = 'product-selection/selection-type';
}
