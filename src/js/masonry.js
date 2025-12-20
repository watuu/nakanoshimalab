import {gsap} from "gsap";

export default class Masonry {
    constructor() {
        if (document.querySelector('.cm-section-masonry')) {
            this.cmSectionMasonry();
        }
    }

    cmSectionMasonry() {
        const grid = document.querySelector('.cm-section-masonry');
        if (!grid) return;

        // function resizeGridItem(item) {
        //     const rowHeight = parseInt(
        //         window.getComputedStyle(grid).getPropertyValue('grid-auto-rows')
        //     );
        //     const rowGap = parseInt(
        //         window.getComputedStyle(grid).getPropertyValue('grid-row-gap')
        //     );
        //     const content = item.querySelector('.c-card-event__link');
        //     const contentHeight = content.getBoundingClientRect().height;
        //     const rowSpan = Math.ceil((contentHeight + rowGap) / (rowHeight + rowGap));
        //     item.style.gridRowEnd = 'span ' + rowSpan;
        // }

        function resizeAllGridItems() {
            const items = grid.querySelectorAll('.c-card-event');

            const rowHeight = parseInt(getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
            const rowGap = parseInt(getComputedStyle(grid).getPropertyValue('grid-row-gap'));

            items.forEach(item => {
                const content = item.querySelector('.c-card-event__link');
                if (!content) return;

                const h = content.getBoundingClientRect().height;
                const span = Math.ceil((h + rowGap) / (rowHeight + rowGap));
                item.style.gridRowEnd = `span ${span}`;
                item.classList.add('rendered')
            });
        }

        // ===== GSAP用 =====
        function animateCards() {
            const items = grid.querySelectorAll('.c-card-event[data-animated="false"]');
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
                        onEnter: () => {
                            item.dataset.animated = "true";
                        }
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

        // ===== More =====
        let page = 2;
        const btn = document.getElementById('topCreativeMore');
        const container = document.querySelector('.cm-section-masonry');

        if (btn) {
            btn.addEventListener('click', () => {
                btn.disabled = true;

                fetch(ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'load_more_posts',
                        page: page
                    })
                })
                    .then(res => res.text())
                    .then(html => {

                        if (!html.trim()) {
                            btn.style.display = 'none';
                            return;
                        }

                        container.insertAdjacentHTML('beforeend', html);

                        // Masonry 再計算
                        resizeAllGridItems();

                        // GSAP アニメーション（必要なら）
                        animateCards();

                        page++;
                        btn.disabled = false;
                    });
            });
        }
        // if (moreBtn) {
        //     moreBtn.addEventListener('click', async () => {
        //         page++;
        //
        //         moreBtn.disabled = true;
        //
        //         try {
        //             const res = await fetch(`./template/ajax-events.html?page=${page}`);
        //             const html = await res.text();
        //
        //             const temp = document.createElement('div');
        //             temp.innerHTML = html;
        //
        //             const newItems = temp.querySelectorAll('.c-card-event');
        //             newItems.forEach(item => {
        //                 item.dataset.animated = "false";
        //                 grid.appendChild(item);
        //             });
        //
        //             // masonry → animation
        //             resizeAllGridItems();
        //
        //             requestAnimationFrame(() => {
        //                 animateCards();
        //             });
        //
        //         } catch (e) {
        //             console.error(e);
        //         } finally {
        //             moreBtn.disabled = false;
        //         }
        //     });
        // }

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
