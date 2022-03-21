import { Sortable } from "sortablejs";
import dayjs from "dayjs";
import utc from "dayjs/plugin/utc";
import timezone from "dayjs/plugin/timezone";

let tableID = '';
let draggableClass = '';
let handleClass = '';
let controllerAPI = '';
let keyId = 0;
let onUpdate = null;

// initialize dayjs
dayjs.extend(utc);
dayjs.extend(timezone);

const sortItems = (src) => {
    const items = Array.from(src.rows).map(row => {
        if (row.classList.contains(draggableClass)) {
            return parseInt(row.dataset.identifier);
        }
    });

    updateItemPositions(items);
};

const updateItemPositions = (list) => {
    let data = new FormData();
    data.set('items', JSON.stringify(list));
    data.set('timezone', dayjs.tz.guess());

    fetch(`${CONFIG.BASE_URL}${controllerAPI}/updateItemPositions/${keyId}`, {
        method: 'POST',
        body: data
    })
        .then(response => response.json())
        .then(result => {
            if (onUpdate) {
                onUpdate(list);
            }
        });
};

const init = () => {
    return new Sortable(document.getElementById(tableID), {
        draggable: `.${draggableClass}`,
        handle: `.${handleClass}`,
        onEnd: (evt) => {
            sortItems(evt.srcElement);
        }
    });
};

const sortableInit = (params) => {
    ({
        tableID,
        draggableClass,
        handleClass,
        controllerAPI,
        keyId,
        onUpdate,
    } = params);

    return init();
};

export { sortableInit };
