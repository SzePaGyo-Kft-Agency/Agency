class AdatBeolvasModel {
    #adatTomb = [];

    constructor(token) {
        this.token = token;
    }

    adatBe(vegpont, myCallBack) {
        fetch(vegpont, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })
            .then((response) => response.json())
            .then((adat) => {
                // console.log('Success:', data);
                this.#adatTomb = adat;
                // console.log(this.#adatTomb);
                myCallBack(this.#adatTomb);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    adatUj(vegpont, adat) {
        fetch(vegpont, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": this.token,
            },
            body: JSON.stringify(adat),
        })
            .then((response) => response.json())
            .then((adat) => {
                console.log("Új adat: " + adat);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    adatModosit(vegpont, adat) {
        console.log("Módosít: " + vegpont);
        fetch(vegpont, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": this.token,
            },
            body: JSON.stringify(adat),
        })
            .then((response) => response.json())
            .then((adat) => {
                console.log("MÓDOSÍTOTTAM: " + adat);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    adatTorol(vegpont, adat) {
        console.log("TÖRÖLT: " + vegpont);
        vegpont += "/" + adat.id;
        fetch(vegpont, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": this.token,
            },
        })
            .then((response) => response.json())
            .then((adat) => {
                console.log("TÖRÖLTEM: " + adat);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
}
export default AdatBeolvasModel;
