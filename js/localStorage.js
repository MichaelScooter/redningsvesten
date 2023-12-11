export default class LocalStorage{

    constructor() {
        this.items = JSON.parse(window.localStorage.getItem("huske"));
        if(this.items === null){
            this.items = [];
        }
    }

    updateItems(ul) {
        this.items = [];
        ul.querySelectorAll("li").forEach((li) => {
            this.items.push(li.outerHTML);

        })

        this.saveItems();
    }


    saveItems() {
        window.localStorage.setItem("huske",JSON.stringify(this.items));
    }

}