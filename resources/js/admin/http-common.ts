import axios, { AxiosInstance } from "axios";
import { HttpResponseStatuses } from "./types/router-enum";
import TokenService from "./services/token-service";
import notify from "./helpers/notify";
import store from "./store";

const apiClient: AxiosInstance = axios.create({
    // baseURL: 'http://',
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
});

apiClient.interceptors.request.use((config: any) => {
    config.headers['Accept-Language'] = 'uz';

    const token: string|null = TokenService.getToken();

    if (token) {
        config.headers.Authorization = 'Bearer ' + token
    }

    store.commit('setLoaderValue', {value: true});
    return config;
}, error => Promise.reject(error));

apiClient.interceptors.response.use((response: any) => {
    const message = response?.data?.data?.message;

    if(message) {
        notify.success(message)
    }

    store.commit('setLoaderValue', {value: false});
    return Promise.resolve(response);
}, (error: any) => {

    if (error.response && error.response.status == HttpResponseStatuses.UNAUTHORIZED) {
        TokenService.removeAll();
    }

    if (error?.response?.data?.message) {
        notify.error(error?.response?.data?.message);
    }

    if (error?.response?.data?.errors) {
        const errors = error?.response?.data?.errors;
        for (let i in errors) {
            notify.error(errors[i]);
        }
    }
    store.commit('setLoaderValue', {value: false});
    return Promise.reject(error);
}, );

export default apiClient;
