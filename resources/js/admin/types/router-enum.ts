export enum HttpResponseStatuses {
    NOT_FOUND = 404,
    BAD_REQUEST = 400,
    SERVER_ERROR = 500,
    BAD_GATEWAY = 502,
    UNAUTHORIZED = 401
}

export enum LocaleStorageItems {
    TOKEN_KEY = 'Authorization',
    REFRESH_TOKEN_KEY = 'Refresh',
    EXPIRE_TIME = 'Expire',
    PERMISSIONS = 'permissions'
}
