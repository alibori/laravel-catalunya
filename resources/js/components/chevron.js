export default function chevron() {
    return {
        show: true,
        init() {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.show = true;
                    } else {
                        this.show = false;
                    }
                });
            }, {
                root: null,
                threshold: 0.75
            });

            observer.observe(document.querySelector('#hero'));
        }
    }
}