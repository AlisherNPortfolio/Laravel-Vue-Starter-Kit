import { Notify } from "quasar";

import { NotifyPosition, NotifyParams } from "../contracts/ui/INotify";

class notify {
    error(
        message: string,
        position: NotifyPosition = 'bottom-right',
        caption: string = 'Error!'
    ): void {
        this.display({
            message, position,
            type: 'negative',
            caption: caption
        });
    }

    success(
        message: string,
        position: NotifyPosition = 'bottom-right',
        caption: string = 'Success!'
    ): void {
        this.display({
            message, position,
            type: 'positive',
            caption: caption
        });
    }

    warning(
        message: string,
        position: NotifyPosition = 'bottom-right',
        caption: string = 'Warning!'
    ): void {
        this.display({
            message, position,
            type: 'warning',
            caption: caption
        });
    }

    private display(params: NotifyParams) {
        Notify.create(params);
    }
}

export default new notify();
