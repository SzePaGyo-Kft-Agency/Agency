import EsemenyAdminController from './Controller/EsemenyAdminController.js';
import EsemenyPublicController from './Controller/EsemenyPublicController.js';
import UgynoksegAdminController from './Controller/UgynoksegAdminController.js';

class index
{
    constructor() {
        this.menuItems = [];
        
        // Létrehozzuk a menü elemeit
        this.menuItems.push(new MenuItem('Esemény Admin', () => new EsemenyAdminController()));
        this.menuItems.push(new MenuItem('Esemény Public', () => new EsemenyPublicController()));
        this.menuItems.push(new MenuItem('Ügynökség Admin', () => new UgynoksegAdminController()));
        
        // Létrehozzuk a menü elemeinek megjelenítését
        this.render();
    }
    
    render() {
        // Létrehozzuk a menü elemeinek megjelenítését a DOM-ban
        for (let i = 0; i < this.menuItems.length; i++) {
            let menuItem = this.menuItems[i];
            
            let menuItemElement = document.createElement('div');
            menuItemElement.innerHTML = menuItem.name;
            menuItemElement.addEventListener('click', () => menuItem.onClick());
            
            document.body.appendChild(menuItemElement);
        }
    }
}

class MenuItem
{
    constructor(name, onClick) {
        this.name = name;
        this.onClick = onClick;
    }
}

export default index;