let filterTrigger = document.getElementById('jobs-filter-trigger');
if (filterTrigger) {
    filterTrigger.onclick = (event) => {
        event.currentTarget.classList.toggle('is-open');
        let filters = document.querySelector('.jobs__filters');
        if (filters) {
            filters.classList.toggle('is-open');
        }
    }
}