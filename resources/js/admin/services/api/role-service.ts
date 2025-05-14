import ICRUD from "@/admin/contracts/services/ICRUD";
import ISuccessResponse from "../../contracts/response/ISuccessResponse";
import http from '../../http-common'
import { IPaginationParams } from "@/admin/contracts/services/IApiData";
import { IRole } from "@/admin/contracts/roles/IRole";
import ISuccessPaginationResponse from "@/admin/contracts/response/ISuccessPaginationResponse";

class RoleService implements ICRUD<IPaginationParams<any>, IRole, IRole> {
    private url = '/api/admin/roles'

    pagination(data: IPaginationParams<any>): Promise<ISuccessPaginationResponse<IRole[]>> {
        return http.get(`${this.url}`, {data})
        .then(res => res.data);
    }

    get(id: number): Promise<ISuccessResponse<IRole>> {
        return http.get(`${this.url}/${id}`)
        .then(res => res.data);
    }
    add(data: IRole): Promise<ISuccessResponse<IRole>> {
        return http.post(`${this.url}`, data)
        .then(res => res.data);
    }
    update(data: IRole, id: number): Promise<ISuccessResponse<IRole>> {
        return http.post(`${this.url}/${id}`, data)
        .then(res => res.data);
    }
    remove(id: number): Promise<ISuccessResponse<boolean>> {
        return http.delete(`${this.url}/${id}`)
        .then(res => res.data);
    }
}

export default new RoleService();
