class esemenyPublicView {

    #elem;

    constructor(elem, szuloElem) {
        this.#elem = elem;
        //egy sort megkell jeleníteni
        szuloElem.append(`<div>
        <h2>${elem.nev}</h2>
        <h4>Szerző: </h4> <p>${elem.agencynev}</p>
        <h4>Ár: ${elem.limit} FT</h4>
        <h4>Cikkszám: ${elem.datum} </h4>
        <h4>Cikkszám: ${elem.hely} </h4>
        <td><button id="jelentkez${elem.id}">Jelentkezem!</button></td>
        </tr></div>`);
        this.tablaElem = szuloElem.children("table:last-child");
    
        //gombok eseménykezelői

        this.sorElem=szuloElem.children("tr:last-child");
        this.jelentkezElem=$(`#jelentkez${elem.id}`);

        this.jelentkezElem.on("click", ()=>{
            this.kattintasTrigger("jelentkezElem");
        })
    }

    kattintasTrigger(esemenynev){
        const esemeny=new CustomEvent(esemenynev,{detail:this.#elem});
        window.dispatchEvent(esemeny);
    }


}

export default esemenyPublicView;