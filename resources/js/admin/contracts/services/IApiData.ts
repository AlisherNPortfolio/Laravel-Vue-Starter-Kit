export interface IPaginationParams<T> {
    page: number,
    per_page: number,
    data?: T
}
