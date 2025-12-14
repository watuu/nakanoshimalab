import { loadDefaultJapaneseParser } from 'budoux';
import {gsap} from "gsap";
// import barba from "@barba/core";
const parser = loadDefaultJapaneseParser();

export default class Masonry {
    constructor() {
        if (document.querySelector('.cm-section-masonry')) {
            this.cmSectionMasonry();
        }
    }

    cmSectionMasonry() {
        const grid = document.querySelector('.cm-section-masonry');
        if (!grid) return;

        function resizeGridItem(item) {
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

        // ===== GSAP用 =====
        function animateCards() {
            const items = document.querySelectorAll('.c-card-event');
            const gridRect = grid.getBoundingClientRect();

            const centerX = gridRect.left + gridRect.width / 2;
            const centerY = gridRect.top + gridRect.height / 2;

            items.forEach(item => {
                const rect = item.getBoundingClientRect();
                const x = rect.left + rect.width / 2;
                const y = rect.top + rect.height / 2;

                const dx = x - centerX;
                const dy = y - centerY;
                const dist = Math.sqrt(dx * dx + dy * dy) || 1;

                const nx = dx / dist;
                const ny = dy / dist;

                // 初期状態（中央寄せ）
                gsap.set(item, {
                    x: nx * 500,
                    // y: ny * 500,
                    y: 100,
                    rotate: nx<0? -45: 45,
                    opacity: 0,
                });

                gsap.to(item, {
                    scrollTrigger: {
                        trigger: item,
                        start: 'top 80%',
                        once: true,
                    },
                    x: 0,
                    y: 0,
                    rotate: 0,
                    opacity: 1,
                    duration: 0.9,
                    ease: 'power3.out',
                });
            });

        }

        // ===== 実行タイミング =====
        window.addEventListener('load', () => {
            resizeAllGridItems();

            // layout確定後に1フレーム待つ（重要）
            requestAnimationFrame(() => {
                animateCards();
            });
        });

        window.addEventListener('resize', () => {
            resizeAllGridItems();
        });
    }
}
