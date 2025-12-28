import {gsap} from "gsap";
import Utility from './utility';

export default class Mv {
    constructor() {
        if (document.querySelector('.p-top-mv-map')) {
            this.draw()
        }
    }
    draw() {
        const tl = gsap.timeline({
            delay: 1,
            defaults: {
                delay: 0
            }
        })
        tl.add(()=>{
            // ===== スポット =====
            const spots = document.querySelectorAll('.p-top-mv-map__cultures li');
            const dom = document.querySelector('.p-top-mv-map');

            const domRect = dom.getBoundingClientRect();
            const centerX = domRect.left + domRect.width / 2;
            const centerY = domRect.top + domRect.height / 2;
            spots.forEach((spot) => {

                const rect = spot.getBoundingClientRect();

                const px = rect.left + rect.width / 2;
                const py = rect.top + rect.height / 2;

                const dx = px - centerX;
                const dy = py - centerY;
                const dist = Math.sqrt(dx * dx + dy * dy) || 1;

                const nx = dx / dist;
                const ny = dy / dist;

                gsap.set(spot, {
                    x: -nx * window.innerWidth/4,
                    y: -ny * window.innerWidth/4,
                    rotate: nx<0? -120: 120,
                    opacity: 0,
                    scale: 0.2,
                    transformOrigin: '50% 50%',
                });


                // アニメーション
                gsap.to(spot, {
                    x: 0,
                    y: 0,
                    rotate: 0,
                    opacity: 1,
                    scale: 1,
                    duration: 4,
                    delay: Math.random() * 0.5,
                    //ease: 'power3.out',
                    ease: "elastic.out(1,0.5)",
                });

                // gsap.to(spot, {opacity: 1, duration: 2})
                const title = spot.querySelector('.p-top-mv-map__title');

                const originalText = title.textContent;
                //const chars = '!@#$%^&*()_+-=<>?/|[]{}';
                const chars = 'abcdefghijklmnopqrstuvwxyz';
                const speed = 300; // 1文字確定ごとの間隔(ms)

                let frame = 0;

                const scramble = () => {
                    const result = originalText
                        .split('')
                        .map((char, index) => {
                            if (index < frame) return char;
                            return chars[Math.floor(Math.random() * chars.length)];
                        })
                        .join('');

                    title.textContent = result;

                    if (frame <= originalText.length) {
                        frame++;
                        setTimeout(scramble, speed);
                    }
                };
                scramble();
            })
        })
        // .add(()=>{
        //     // ===== LINE =====
        //     const dom = document.querySelector('.p-top-mv-map');
        //     const lines = dom.querySelectorAll('.p-top-mv-map__lines figure');
        //
        //     const domRect = dom.getBoundingClientRect();
        //     const centerX = domRect.left + domRect.width / 2;
        //     const centerY = domRect.top + domRect.height / 2;
        //
        //     lines.forEach((line) => {
        //         const rect = line.getBoundingClientRect();
        //
        //         const px = rect.left + rect.width / 2;
        //         const py = rect.top + rect.height / 2;
        //
        //         const dx = px - centerX;
        //         const dy = py - centerY;
        //         const dist = Math.sqrt(dx * dx + dy * dy) || 1;
        //
        //         const nx = dx / dist;
        //         const ny = dy / dist;
        //
        //         gsap.set(line, {
        //             x: -nx * window.innerWidth/4,
        //             y: -ny * window.innerWidth/4,
        //             rotate: nx<0? -120: 120,
        //             opacity: 0,
        //             scale: 0.2,
        //             transformOrigin: '50% 50%',
        //         });
        //
        //
        //         // アニメーション
        //         gsap.to(line, {
        //             // scrollTrigger: {
        //             //     trigger: '.p-top-mv-map',
        //             //     start: 'top top',
        //             //     once: true,
        //             // },
        //             x: 0,
        //             y: 0,
        //             rotate: 0,
        //             opacity: 1,
        //             scale: 1,
        //             duration: 5,
        //             delay: Math.random() * 0.5,
        //             //ease: 'power3.out',
        //             ease: "elastic.out(1,0.5)",
        //         });
        //     });
        // }, '<')

            .add(()=>{
                // ===== タイトル =====
                const svg = Utility.isPC()?
                    document.querySelector('.p-top-mv-map__type svg.pc'):
                    document.querySelector('.p-top-mv-map__type svg.sp-tab');
                const paths = svg.querySelectorAll('path');

                const svgRect = svg.getBoundingClientRect();
                const svgCenterX = svgRect.left + svgRect.width / 2;
                const svgCenterY = svgRect.top + svgRect.height / 2;

                paths.forEach((path) => {
                    const rect = path.getBoundingClientRect();

                    const px = rect.left + rect.width / 2;
                    const py = rect.top + rect.height / 2;

                    const dx = px - svgCenterX;
                    const dy = py - svgCenterY;
                    const dist = Math.sqrt(dx * dx + dy * dy) || 1;

                    const nx = dx / dist;
                    const ny = dy / dist;

                    // 初期状態
                    gsap.set(path, {
                        x: nx * window.innerWidth/2,
                        y: ny * window.innerWidth/2,
                        rotate: -180,
                        opacity: 0,
                        transformOrigin: '50% 50%',
                    });

                    // アニメーション
                    gsap.to(path, {
                        x: 0,
                        y: 0,
                        rotate: 0,
                        opacity: 1,
                        duration: 2,
                        delay: Math.random() * 0.6,
                        ease: 'power3.out',
                    });
                });
            }, "<+1")
            .add(() => {
                // MV下部テキスト
                const svg = document.querySelector('.p-top-mv__txt svg');
                const paths = svg.querySelectorAll('path');

                const svgRect = svg.getBoundingClientRect();
                const centerX = svgRect.left + svgRect.width / 2;
                const centerY = svgRect.top + svgRect.height / 2;

                paths.forEach((path) => {
                    const rect = path.getBoundingClientRect();

                    const px = rect.left + rect.width / 2;
                    const py = rect.top + rect.height / 2;

                    const dx = px - centerX;
                    const dy = py - centerY;
                    const dist = Math.sqrt(dx * dx + dy * dy) || 1;

                    const nx = dx / dist;
                    const ny = dy / dist;

                    // 初期状態
                    gsap.set(path, {
                        x: nx * 200,
                        y: ny * 200,
                        rotate: -180,
                        opacity: 0,
                        transformOrigin: '50% 50%',
                    });

                    // アニメーション
                    gsap.to(path, {
                        scrollTrigger: {
                            trigger: '.p-top-mv__txt',
                            start: 'top 70%',
                            once: true,
                        },
                        x: 0,
                        y: 0,
                        rotate: 0,
                        opacity: 1,
                        duration: 1.2,
                        delay: Math.random() * 0.6,
                        ease: 'power3.out',
                    });
                });
            })
            .add(() => {
                const picTl = createPicToggleTimeline();
                picTl.play();
                // gsap.to('.l-header', {
                //     opacity: 1,
                //     duration: 0.5,
                //     ease: 'power3.out'
                // })
            }, "+=2");


        function createPicToggleTimeline() {
            const pics = document.querySelectorAll('.p-top-mv-map__pic');

            gsap.set(pics, {
                clipPath: 'inset(0 100% 0 0)'
            });

            const picTl = gsap.timeline({
                repeat: -1,
                repeatDelay: 0
            });

            pics.forEach((pic, i) => {
                picTl
                    // 表示
                    .to(pic, {
                        clipPath: 'inset(0 0% 0 0)',
                        duration: 0.3,
                        ease: 'power3.out'
                    })
                    // 表示保持
                    .to({}, { duration: 2.5 })
                    // フェードアウト開始位置にラベル
                    .add(`hide-${i}`)
                    // 非表示
                    .to(pic, {
                        clipPath: 'inset(0 0 0 100%)',
                        duration: 0.3,
                        ease: 'power3.out'
                    });

                // 次の画像を少し前から出す
                if (i < pics.length - 1) {
                    picTl.to(pics[i + 1], {
                        clipPath: 'inset(0 0% 0 0)',
                        duration: 0.3,
                        ease: 'power3.out'
                    }, `hide-${i}-=0`);
                }
            });

            return picTl;
        }


    }
}

