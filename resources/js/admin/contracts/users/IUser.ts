export interface IAdminUser {
    id?: number | null;
    email: string | null;
    name: string | null;
    password: string | null;
    password_confirmation: string | null;
    remember: boolean;
}

export interface IUser {
    id?: number | null;
    email: string | null;
    name: string | null;
    password: string | null;
    password_confirmation: string | null;
    remember: boolean;
}
