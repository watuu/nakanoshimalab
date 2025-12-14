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
            delay: 0,
            defaults: {
                delay: 0
            }
        })

        tl.add(()=>{
            // ===== LINE =====
            const dom = document.querySelector('.p-top-mv-map');
            const lines = dom.querySelectorAll('.p-top-mv-map__lines figure');

            const domRect = dom.getBoundingClientRect();
            const centerX = domRect.left + domRect.width / 2;
            const centerY = domRect.top + domRect.height / 2;

            lines.forEach((line) => {
                const rect = line.getBoundingClientRect();

                const px = rect.left + rect.width / 2;
                const py = rect.top + rect.height / 2;

                const dx = px - centerX;
                const dy = py - centerY;
                const dist = Math.sqrt(dx * dx + dy * dy) || 1;

                const nx = dx / dist;
                const ny = dy / dist;

                gsap.set(line, {
                    x: -nx * window.innerWidth/2,
                    y: -ny * window.innerWidth/2,
                    rotate: nx<0? -120: 120,
                    opacity: 0,
                    scale: 0.2,
                    transformOrigin: '50% 50%',
                });


                // アニメーション
                gsap.to(line, {
                    // scrollTrigger: {
                    //     trigger: '.p-top-mv-map',
                    //     start: 'top top',
                    //     once: true,
                    // },
                    x: 0,
                    y: 0,
                    rotate: 0,
                    opacity: 1,
                    scale: 1,
                    duration: 5,
                    delay: Math.random() * 0.5,
                    //ease: 'power3.out',
                    ease: "elastic.inOut(1,0.5)",
                });
            });
        })
            .add(()=>{
                // ===== スポット =====
                const spots = document.querySelectorAll('.p-top-mv-map__cultures li');
                spots.forEach((spot) => {
                    gsap.to(spot, {opacity: 1, duration: 1})
                    const title = spot.querySelector('.p-top-mv-map__title');

                    const originalText = title.textContent;
                    //const chars = '!@#$%^&*()_+-=<>?/|[]{}';
                    const chars = 'abcdefghijklmnopqrstuvwxyz';
                    const speed = 100; // 1文字確定ごとの間隔(ms)

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
            }, "<+3")
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
            }, "<")
            .add(() => {
                const picTl = createPicToggleTimeline();
                picTl.play();
            }, "+=0.5");


        function createPicToggleTimeline() {
            const pics = document.querySelectorAll('.p-top-mv-map__pic');

            const picTl = gsap.timeline({
                repeat: -1,
                repeatDelay: 0
            });

            pics.forEach((pic, i) => {
                picTl
                    // フェードイン
                    .to(pic, {
                        opacity: 1,
                        duration: 0.9,
                        ease: 'power3.out'
                    })
                    // フェードアウト
                    .to(pic, {
                        opacity: 0,
                        duration: 0.9,
                        ease: 'power3.out'
                    }, '+=1.5');

                // 次の画像を「少し前から」出す
                if (i < pics.length - 1) {
                    picTl.to(pics[i + 1], {
                        opacity: 1,
                        duration: 0.9,
                        ease: 'power3.out'
                    }, '-=0.9'); // ← ここがクロスフェードの肝
                }
            });

            return picTl;
        }


    }
}

