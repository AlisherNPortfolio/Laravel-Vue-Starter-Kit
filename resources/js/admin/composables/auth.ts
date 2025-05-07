import { Ref, ref } from "vue";
import { useRouter } from "vue-router";
import { ILogin } from "../contracts/auth/IAuth";
import AuthService from "../services/api/auth-service";
import TokenService from "../services/local/token-service";
import notify from "../helpers/notify";
import store from "../store";

export default function useAuth() {
    const router = useRouter();
    const form: Ref<ILogin> = ref({
        email: null,
        password: null,
        remember: false
    });
    // ========== methods ===============
    const login = () => {
        store.setLoadingStatus(true);
        try {
            AuthService.login(form.value)
            .then((res: any) => {
                if (res.success) {
                    TokenService.saveToken(res.data.token);
                    const permissions: string[] = res.data.permissions;
                    TokenService.savePermissions(JSON.stringify(permissions));
                    router.push({name: 'dashboard'})
                } else {
                    notify.error('Login qilishda xatolik!', 'bottom-right', res.message);
                }
            }).finally(() => {
                store.setLoadingStatus(false);
            })
        } catch (error) {
            notify.error('Login qilishda xatolik!' + error);
        }
    }

    return {
        form,
        // ======== methods ======
        login
    }
}
