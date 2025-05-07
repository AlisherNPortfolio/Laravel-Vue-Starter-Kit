export interface ILogin {
    email: string|null,
    password: string|null,
    remember: boolean
}

export interface IRegister extends ILogin {
    password_confirmation: string|null
}

export interface ILoginResponse {
    token: string,
    permissions: string[],
    expire_time: string
}
