window.constants = {
    enabled_legacy_browser: false,
}
import {default as Common} from './common';
// import Barba from './barba';
import Page from './page';
import Masonry from './masonry';
import Mv from './mv';
import BudouX from './budoux';

class APP {
    constructor() {
        const common = new Common();
        common.load();
        // new Barba();
        new Masonry();
        new Page();
        new Mv();
        new BudouX();
    }
}

new APP()