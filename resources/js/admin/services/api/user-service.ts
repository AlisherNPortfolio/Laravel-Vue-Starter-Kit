import ICRUD from "@/admin/contracts/services/ICRUD";
import ISuccessResponse from "../../contracts/response/ISuccessResponse";
import http from '../../http-common'
import { IPaginationParams } from "@/admin/contracts/services/IApiData";
import { IAdminUser } from "@/admin/contracts/users/IUser";
import ISuccessPaginationResponse from "@/admin/contracts/response/ISuccessPaginationResponse";

class UserService implements ICRUD<IPaginationParams<any>, IAdminUser, IAdminUser> {
    private url = '/api/admin/users'

    pagination(data: IPaginationParams<any>): Promise<ISuccessPaginationResponse<IAdminUser[]>> {
        return http.get(`${this.url}`, {data})
        .then(res => res.data);
    }

    get(id: number): Promise<ISuccessResponse<IAdminUser>> {
        return http.get(`${this.url}/${id}`)
        .then(res => res.data);
    }
    add(data: IAdminUser): Promise<ISuccessResponse<IAdminUser>> {
        return http.post(`${this.url}`, data)
        .then(res => res.data);
    }
    update(data: IAdminUser, id: number): Promise<ISuccessResponse<IAdminUser>> {
        return http.post(`${this.url}/${id}`, data)
        .then(res => res.data);
    }
    remove(id: number): Promise<ISuccessResponse<boolean>> {
        throw new Error('Method not implemented.');
    }
}

export default new UserService();
