export interface Menu {
    icon: string,
    text: string,
    link?: string | null,
    children?: Menu[]
}

export interface LittleMenu {
    text: string,
    link: string
}
