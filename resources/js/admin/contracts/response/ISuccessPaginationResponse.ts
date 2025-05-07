import IPagination from "./IPaginationResponse";

export default interface ISuccessPaginationResponse<T> {
    success: boolean,
    data: IPagination<T>
}
