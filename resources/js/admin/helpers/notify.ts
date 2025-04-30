import { Notify } from "quasar";

import { NotifyPosition, NotifyParams } from "../contracts/ui/INotify";

class notify {
    error(
        message: string,
        position: NotifyPosition = 'bottom-right'
    ): void {
        this.display({
            message, position,
            type: 'negative',
            caption: 'Error!'
        });
    }

    success(
        message: string,
        position: NotifyPosition = 'bottom-right'
    ): void {
        this.display({
            message, position,
            type: 'positive',
            caption: 'Success!'
        });
    }

    warning(
        message: string,
        position: NotifyPosition = 'bottom-right'
    ): void {
        this.display({
            message, position,
            type: 'warning',
            caption: 'Warning!'
        });
    }

    private display(params: NotifyParams) {
        Notify.create(params);
    }
}

export default new notify();
