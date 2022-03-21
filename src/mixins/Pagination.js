import { fromEvent } from "rxjs";
import { tap, map } from "rxjs/operators";

const setPagination = (selector, callback) => {
    const paginationClasses = document.querySelectorAll(`${selector} a[href]`);

    if (paginationClasses.length) {
        fromEvent(paginationClasses, 'click').pipe(
            tap(e => e.preventDefault()),
            map(e => callback(e.target.getAttribute('data-ci-pagination-page')))
        ).subscribe();
    }
}

export { setPagination };