import { LocaleStorageItems } from "../../types/router-enum";

const TokenService = {
	getToken() {
		return localStorage.getItem(LocaleStorageItems.TOKEN_KEY);
	},
	removeToken() {
		localStorage.removeItem(LocaleStorageItems.TOKEN_KEY);
	},
	saveToken(token: string) {
		localStorage.setItem(LocaleStorageItems.TOKEN_KEY, token);
	},
	getPermissions() {
		return localStorage.getItem(LocaleStorageItems.PERMISSIONS);
	},
	savePermissions(permissions: string) {
		localStorage.setItem(LocaleStorageItems.PERMISSIONS, permissions);
	},
	removePermissions() {
		localStorage.removeItem(LocaleStorageItems.PERMISSIONS);
	},
	saveRefreshToken(token: string) {
		localStorage.setItem(LocaleStorageItems.REFRESH_TOKEN_KEY, token);
	},
	getRefreshToken() {
		return localStorage.getItem(LocaleStorageItems.REFRESH_TOKEN_KEY);
	},
	removeRefreshToken() {
		localStorage.removeItem(LocaleStorageItems.REFRESH_TOKEN_KEY);
	},
	saveExpireTime(time: string) {
		localStorage.setItem(LocaleStorageItems.EXPIRE_TIME, time);
	},
	getExpireTime() {
		return localStorage.getItem(LocaleStorageItems.EXPIRE_TIME);
	},
	removeExpireTime() {
		localStorage.removeItem(LocaleStorageItems.EXPIRE_TIME);
	},


	removeAll() {
		this.removeToken();
		this.removeRefreshToken();
		this.removeExpireTime();
		this.removePermissions();
        window.location.href = '/login';
	},
};

export default TokenService;
