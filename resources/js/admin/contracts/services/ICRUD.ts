import ISuccessPaginationResponse from "../../contracts/response/ISuccessPaginationResponse";
import ISuccessResponse from "../../contracts/response/ISuccessResponse";

export default interface ICRUD<PALL, PFORM, R> {
    pagination(data: PALL): Promise<ISuccessPaginationResponse<R[]>>;
    get(id: number): Promise<ISuccessResponse<R>>;
    add(data: PFORM): Promise<ISuccessResponse<R>>;
    update(data: PFORM, id: number): Promise<ISuccessResponse<R>>;
    remove(id: number): Promise<ISuccessResponse<boolean>>;
}
