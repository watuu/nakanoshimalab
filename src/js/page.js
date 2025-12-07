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
        if (document.querySelector('.p-top-map')) {
            //
            this.pTopMap();
            this.pTopMapModal();
        }

    }

    pTopMap() {
        const container = document.querySelector('.p-top-map-area');
        let isDown = false;
        let startX;
        let scrollLeft;

        container.addEventListener('mousedown', e => {
            isDown = true;
            container.classList.add('active');
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
        });

        container.addEventListener('mouseleave', () => {
            isDown = false;
            container.classList.remove('active');
        });

        container.addEventListener('mouseup', () => {
            isDown = false;
            container.classList.remove('active');
        });

        container.addEventListener('mousemove', e => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = x - startX;
            container.scrollLeft = scrollLeft - walk;
        });

        // スマホスワイプにも対応
        container.addEventListener('touchstart', e => {
            container.classList.add('active');
            startX = e.touches[0].pageX;
            scrollLeft = container.scrollLeft;
        });

        container.addEventListener('touchend', () => {
            container.classList.remove('active');
        });

        container.addEventListener('touchmove', e => {
            const x = e.touches[0].pageX;
            const walk = x - startX;
            container.scrollLeft = scrollLeft - walk;
        });
    }

    pTopMapModal() {
        const jsonDataElement = document.getElementById('spotData');
        const modal = document.getElementById('modal-spot');
        if ($('.p-top-map-area__btn').length && jsonDataElement && modal) {
            // document.body.appendChild(modal);

            let currentOrder = 1;
            const spotData = JSON.parse(jsonDataElement.textContent);

            const preloadedImages = {};
            if (spotData) {
                spotData.forEach(spot => {
                    if (spot['pic']) {
                        const img = new Image();
                        img.src = spot['pic'];
                        preloadedImages[spot.order] = img;
                    }
                });
            }

            function updateCurrentBtn(order) {
                document.querySelectorAll('.p-top-map-area__btn').forEach(btn => {
                    const id = parseInt(btn.getAttribute('data-spot-id'));
                    if (id === order) {
                        btn.classList.add('is-current');
                    } else {
                        btn.classList.remove('is-current');
                    }
                });
            }

            function updateModal(order) {
                const spot = spotData.find(item => item.no === order);
                if (!spot) return;

                updateCurrentBtn(order);

                gsap.timeline({
                    defaults: {
                        ease: 'none'
                    }
                })
                    .to('.cm-modal-spot-card', {
                        opacity: 0,
                        duration: 0.3,
                        ease: 'power3.out',
                    })
                    .add( function(){
                        // モーダル内のDOM要素を更新
                        document.querySelector(".cm-modal-spot #spot_pic").src = spot['pic'];
                        document.querySelector(".cm-modal-spot #spot_no").textContent = spot.no;
                        document.querySelector(".cm-modal-spot #spot_name").textContent = spot.name;
                        document.querySelector(".cm-modal-spot #spot_name2").textContent = spot.name2;
                        document.querySelector(".cm-modal-spot #spot_desc").textContent = spot.desc;
                        document.querySelector(".cm-modal-spot #spot_address").textContent = spot.address;
                        document.querySelector(".cm-modal-spot #spot_tel").textContent = spot.tel;
                        document.querySelector(".cm-modal-spot #spot_open").textContent = spot.open;
                        document.querySelector(".cm-modal-spot #spot_web").textContent = spot.web;
                        document.querySelector(".cm-modal-spot #spot_x a").href = spot.x;
                        document.querySelector(".cm-modal-spot #spot_instagram a").href = spot.instagram;
                        document.querySelector(".cm-modal-spot #spot_facebook a").href = spot.facebook;
                        document.querySelector(".cm-modal-spot #spot_youtube a").href = spot.youtube;
                        // event URLの調整
                        const eventBtn = document.querySelector(".cm-modal-spot #spot_event");
                        const eventTitle = document.querySelector(".cm-modal-spot #spot_event_title");

                        if (!spot.event_url) {
                            eventBtn.style.display = 'none';
                        } else {
                            eventBtn.style.display = '';
                            eventBtn.href = spot.event_url.url || '#';

                            if (spot.event_url.title && spot.event_url.title.trim() !== '') {
                                eventTitle.textContent = spot.event_url.title;
                            } else {
                                eventTitle.textContent = '関連イベントを見る';
                            }
                        }
                        currentOrder = order;
                    })
                    .to('.cm-modal-spot-card', {
                        opacity: 1,
                        delay: 0.1,
                        duration: 0.3,
                        ease: 'power3.out',
                    })
            }

            document.querySelectorAll(".p-top-map-area__btn").forEach(button => {
                button.addEventListener("click", () => {
                    const order = parseInt(button.getAttribute("data-spot-id"));
                    updateModal(order);
                });
            });

            document.getElementById("btnSpotPrev").addEventListener("click", () => {
                const prevOrder = currentOrder > 1 ? currentOrder - 1 : spotData.length;
                updateModal(prevOrder);
            });

            document.getElementById("btnSpotNext").addEventListener("click", () => {
                const nextOrder = currentOrder < spotData.length ? currentOrder + 1 : 1;
                updateModal(nextOrder);
            });
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
