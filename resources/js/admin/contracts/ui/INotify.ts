export type NotifyPosition = "top-left"|"top-right"|"bottom-left"|"bottom-right"|"top"|"bottom"|"left"|"right"|"center";
export type NotifyType = 'positive'|'negative'|'warning'|'info'|'ongoing';

export interface NotifyParams {
    message: string,
    position: NotifyPosition,
    type: NotifyType,
    caption: string
}
