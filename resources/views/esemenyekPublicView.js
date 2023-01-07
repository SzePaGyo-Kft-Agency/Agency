import esemenyPublicView from "./esemenyPublicView";

class esemenyekPublicView{
    constructor(tomb, szuloElem) {
        szuloElem.html(`<div class="foDiv"><header>SzePaGyö Kft - Események</header></div>`);
        this.divElem = szuloElem.children("div:last-child");

        tomb.forEach(esemeny => {
            const esemenyek = new esemenyPublicView(esemeny,this.divElem);
        });
    }
}
export default esemenyekPublicView;