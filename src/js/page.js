import $ from "jQuery";
import Utility from './utility';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { ScrollToPlugin } from "gsap/ScrollToPlugin"

import Swiper, { Navigation, Pagination, Autoplay, Scrollbar, EffectFade } from 'swiper';
import 'swiper/css/bundle'
Swiper.use([Navigation, Pagination, Autoplay, Scrollbar, EffectFade]);

export default class Page {
    constructor() {
        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
        if (document.querySelector('.cm-section-masonry')) {
            //
            this.cmSectionMasonry();
        }
    }

    cmSectionMasonry() {
        function resizeGridItem(item) {
            const grid = document.querySelector('.cm-section-masonry');
            const rowHeight = parseInt(
                window.getComputedStyle(grid).getPropertyValue('grid-auto-rows')
            );
            const rowGap = parseInt(
                window.getComputedStyle(grid).getPropertyValue('grid-row-gap')
            );
            const content = item.querySelector('.c-card-event__link');
            const contentHeight = content.getBoundingClientRect().height;
            const rowSpan = Math.ceil((contentHeight + rowGap) / (rowHeight + rowGap));
            item.style.gridRowEnd = 'span ' + rowSpan;
        }

        function resizeAllGridItems() {
            const allItems = document.querySelectorAll('.c-card-event');
            allItems.forEach(item => resizeGridItem(item));
        }

        window.addEventListener('load', resizeAllGridItems);
        window.addEventListener('resize', resizeAllGridItems);
    }

}
