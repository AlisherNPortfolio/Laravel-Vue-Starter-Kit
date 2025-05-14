import { reactive, Ref, ref, UnwrapNestedRefs } from "vue";
import { useRoute, useRouter } from "vue-router";
import { IRole } from "../contracts/roles/IRole";
import ITableColumn from "../contracts/ui/ITableColumn";
import { IPaginationParams } from "../contracts/services/IApiData";
import notify from "../helpers/notify";
import roleService from "../services/api/role-service";

export default function useRole() {
    const router = useRouter();
    const route = useRoute();

    let id: Ref<number | null> = ref(null);
    let isEdit: Ref<boolean> = ref(false);

    let paginationData: UnwrapNestedRefs<IPaginationParams<null>> = reactive({page: 1, per_page: 100, sortBy: 'desc', descending: false});

    let form: Ref<IRole> = ref({
            id: null,
            name: null,
            guard_name: null,
        });
    const formCopy: Ref<IRole> = form;
    const list: Ref<IRole[]> = ref([]);
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
            name: 'guard_name',
            required: true,
            label: 'Guard name',
            align: 'left',
            field: row => row.guard_name
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
        return roleService.pagination(paginationData)
        .then(res => {
            if (res.success) {
                list.value = res.data.data;
                totalCount.value = res.data.count;
            } else {
                notify.error('Rollarni olishda xatolik')
            }
        });
    }

    const getOne = (id: number) => {
        return roleService.get(id)
        .then(res => res.data);
    }


    const save = (form: IRole) => {
        addOrEdit(form)
        .then(res => {
            if (res.success) {
                notify.success('Role saved');
                reset();
                router.push({name: 'users'});
            }
        })
    }

    const addOrEdit = (formData: IRole) => {
        return isEdit.value ? roleService.update(formData, id.value as number) : roleService.add(formData);
    }

    const remove = (id: number|string|null) => {
        return roleService.remove(id as number)
        .then(res => {
            if (res.success) {
                notify.success("Rol o'chirildi!");
            } else {
                notify.error("Rolni o'chirishda xatolik")
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
