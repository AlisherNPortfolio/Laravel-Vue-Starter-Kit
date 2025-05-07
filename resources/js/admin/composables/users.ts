import { reactive, Ref, ref, UnwrapNestedRefs } from "vue";
import { useRoute, useRouter } from "vue-router";
import { IAdminUser } from "../contracts/users/IUser";
import ITableColumn from "../contracts/ui/ITableColumn";
import UserService from "../services/api/user-service";
import { IPaginationParams } from "../contracts/services/IApiData";
import notify from "../helpers/notify";

export default function useUser() {
    const router = useRouter();
    const route = useRoute();

    let id: Ref<number | null> = ref(null);
    let isEdit: Ref<boolean> = ref(false);

    let paginationData: UnwrapNestedRefs<IPaginationParams<null>> = reactive({page: 1, per_page: 100, sortBy: 'desc', descending: false});

    let form: Ref<IAdminUser> = ref({
            id: null,
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            remember: false
        });
    const formCopy: Ref<IAdminUser> = form;
    const list: Ref<IAdminUser[]> = ref([]);
    const totalCount: Ref<number> = ref(0);

    const columns: ITableColumn[] = [
        {
            name: 'name',
            required: true,
            label: 'Name',
            align: 'left',
            field: row => row.name
        },
        {
            name: 'is_active',
            required: true,
            label: 'Email',
            align: 'center',
            field: 'is_active'
        },
        {
            name: 'actions',
            required: true,
            label: 'Actions',
            align: 'center',
            field: ''
        }
    ];

    // ========== Methods ==========
    const getList = () => {
        return UserService.pagination(paginationData)
        .then(res => {
            if (res.success) {
                list.value = res.data.data;
                totalCount.value = res.data.count;
            } else {
                notify.error('Userlarni olishda xatolik')
            }
        });
    }

    const getOne = (id: number) => {
        return UserService.get(id)
        .then(res => res.data);
    }


    const save = (form: IAdminUser) => {
        addOrEdit(form)
        .then(res => {
            if (res.success) {
                notify.success('User saved');
                reset();
                router.push({name: 'users'});
            }
        })
    }

    const addOrEdit = (formData: IAdminUser) => {
        return isEdit.value ? UserService.update(formData, id.value as number) : UserService.add(formData);
    }

    const remove = (id: number|string|null) => {
        return UserService.remove(id as number)
        .then(res => {
            if (res.success) {
                notify.success("User o'chirildi!");
            } else {
                notify.error("Userni o'chirishda xatolik")
            }
        });
    }

    const reset = () => {
        form = formCopy;
    }

    function defineIsEdit() {
        const innerId = route.params?.id;
        if (innerId) {
            isEdit.value = true;
            id.value = +innerId;
        }
    }

    defineIsEdit();

    return {
        getList,
        getOne,
        save,
        remove,
        reset,
        // ==========
        form,
        id,
        isEdit,
        columns,
        list
    }
}
