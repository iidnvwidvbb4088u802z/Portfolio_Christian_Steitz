/**
 * Theme interactions: accessible mobile navigation, subtle reveal motion and
 * a pause button for the background video.
 */
(function () {
	'use strict';

	const documentRoot = document.documentElement;
	const body = document.body;
	const menuButton = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('.primary-navigation');
	const menuLabel = document.querySelector('[data-menu-label]');
	const header = document.querySelector('[data-site-header]');
	const heroVideo = document.querySelector('[data-hero-video]');
	const videoButton = document.querySelector('[data-video-toggle]');
	const videoButtonLabel = document.querySelector('[data-video-toggle-label]');
	const disciplineArea = document.querySelector('[data-disciplines]');
	const siteIntro = document.querySelector('[data-site-intro]');
	const introSkip = document.querySelector('[data-intro-skip]');
	const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	const hasGsap = !reduceMotion && Boolean(window.gsap && window.ScrollTrigger);
	const shouldPlayIntro = Boolean(siteIntro && hasGsap);
	let smoothScroller = null;
	let lastFocusedElement = null;

	function showSite() {
		documentRoot.classList.remove('intro-active');
		documentRoot.classList.add('site-loaded');
		if (siteIntro) {
			siteIntro.hidden = true;
		}
		if (smoothScroller) {
			smoothScroller.start();
		}
	}

	if (shouldPlayIntro) {
		documentRoot.classList.add('intro-active');
	} else {
		window.requestAnimationFrame(showSite);
	}

	if (!reduceMotion && window.Lenis) {
		smoothScroller = new window.Lenis({
			duration: 1.05,
			smoothWheel: true,
			wheelMultiplier: 0.88,
			touchMultiplier: 1.05,
			anchors: false
		});
		documentRoot.classList.add('has-lenis');
		if (shouldPlayIntro) {
			smoothScroller.stop();
		}

		if (hasGsap) {
			smoothScroller.on('scroll', window.ScrollTrigger.update);
			window.gsap.ticker.add(function (time) {
				smoothScroller.raf(time * 1000);
			});
			window.gsap.ticker.lagSmoothing(0);
		} else {
			function lenisFrame(time) {
				smoothScroller.raf(time);
				window.requestAnimationFrame(lenisFrame);
			}
			window.requestAnimationFrame(lenisFrame);
		}
	}

	if (hasGsap) {
		const gsap = window.gsap;
		gsap.registerPlugin(window.ScrollTrigger);

		if (shouldPlayIntro) {
			const introTimeline = gsap.timeline({
				defaults: { ease: 'power4.out' },
				onComplete: showSite
			});

			introTimeline
				.set('[data-intro-first]', { autoAlpha: 0, xPercent: -135, rotation: -4 })
				.set('[data-intro-last]', { autoAlpha: 0, xPercent: 135, rotation: 4 }, 0)
				.set('[data-intro-kicker]', { autoAlpha: 0, y: 18 }, 0)
				.set('[data-intro-line]', { scaleX: 0 }, 0)
				.to('[data-intro-first]', { autoAlpha: 1, xPercent: 0, rotation: 0, duration: 1.15 }, 0.12)
				.to('[data-intro-last]', { autoAlpha: 1, xPercent: 0, rotation: 0, duration: 1.15 }, 0.12)
				.to('[data-intro-line]', { scaleX: 1, duration: 0.72, ease: 'expo.out' }, 0.58)
				.to('[data-intro-kicker]', { autoAlpha: 1, y: 0, duration: 0.65 }, 0.72)
				.to('[data-intro-stage], [data-intro-skip]', { autoAlpha: 0, scale: 0.96, duration: 0.42, ease: 'power2.in' }, 1.72)
				.to('[data-intro-panel-top]', { yPercent: -101, duration: 1.08, ease: 'power4.inOut' }, 1.9)
				.to('[data-intro-panel-bottom]', { yPercent: 101, duration: 1.08, ease: 'power4.inOut' }, 1.9)
				.to(siteIntro, { autoAlpha: 0, duration: 0.12 }, 2.9);

			if (introSkip) {
				introSkip.addEventListener('click', function () {
					introTimeline.progress(1);
				});
			}
		}

		gsap.utils.toArray('[data-reveal]').forEach(function (item) {
			gsap.from(item, {
				autoAlpha: 0,
				y: 58,
				duration: 1.05,
				ease: 'power3.out',
				scrollTrigger: {
					trigger: item,
					start: 'top 88%',
					once: true
				}
			});
		});

		window.ScrollTrigger.batch('[data-gsap-card]', {
			start: 'top 90%',
			once: true,
			onEnter: function (cards) {
				gsap.from(cards, {
					autoAlpha: 0,
					y: 72,
					scale: 0.965,
					duration: 1.1,
					stagger: 0.11,
					ease: 'power3.out',
					clearProps: 'opacity,visibility,transform'
				});
			}
		});

		window.ScrollTrigger.batch('[data-gsap-project]', {
			start: 'top 92%',
			once: true,
			onEnter: function (cards) {
				gsap.from(cards, {
					autoAlpha: 0,
					y: 82,
					rotation: function (index) { return index % 2 ? 1.2 : -1.2; },
					duration: 0.95,
					stagger: 0.085,
					ease: 'power3.out',
					clearProps: 'opacity,visibility,transform'
				});
			}
		});

		gsap.utils.toArray('[data-gsap-parallax]').forEach(function (item) {
			gsap.fromTo(item, { yPercent: 5 }, {
				yPercent: -5,
				ease: 'none',
				scrollTrigger: {
					trigger: item,
					start: 'top bottom',
					end: 'bottom top',
					scrub: 0.7
				}
			});
		});

		gsap.utils.toArray('.section-heading h2, .project-grid-header h2, .discipline-heading h2').forEach(function (heading) {
			gsap.from(heading, {
				backgroundPositionX: '100%',
				x: -28,
				duration: 1.2,
				ease: 'expo.out',
				scrollTrigger: {
					trigger: heading,
					start: 'top 90%',
					once: true
				}
			});
		});
	}

	function scrollToTarget(target) {
		if (!target) {
			return;
		}

		if (smoothScroller) {
			smoothScroller.scrollTo(target, { offset: -72, duration: 1.15 });
			return;
		}

		target.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
	}

	function getFocusableElements() {
		if (!navigation) {
			return [];
		}

		return Array.from(
			navigation.querySelectorAll('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])')
		);
	}

	function openMenu() {
		if (!menuButton || !navigation) {
			return;
		}

		lastFocusedElement = document.activeElement;
		menuButton.setAttribute('aria-expanded', 'true');
		navigation.classList.add('is-open');
		body.classList.add('menu-open');
		if (smoothScroller) {
			smoothScroller.stop();
		}
		if (menuLabel) {
			menuLabel.textContent = 'Schliessen';
		}

		const focusable = getFocusableElements();
		if (focusable.length) {
			window.setTimeout(function () {
				focusable[0].focus();
			}, 160);
		}
	}

	function closeMenu(restoreFocus) {
		if (!menuButton || !navigation) {
			return;
		}

		menuButton.setAttribute('aria-expanded', 'false');
		navigation.classList.remove('is-open');
		body.classList.remove('menu-open');
		if (smoothScroller) {
			smoothScroller.start();
		}
		if (menuLabel) {
			menuLabel.textContent = 'Menü';
		}

		if (restoreFocus && lastFocusedElement) {
			lastFocusedElement.focus();
		}
	}

	if (menuButton && navigation) {
		menuButton.addEventListener('click', function () {
			if (menuButton.getAttribute('aria-expanded') === 'true') {
				closeMenu(false);
			} else {
				openMenu();
			}
		});

		navigation.addEventListener('click', function (event) {
			const link = event.target.closest('a');
			if (!link) {
				return;
			}

			const linkUrl = new URL(link.href, window.location.href);
			const isSamePageAnchor = linkUrl.origin === window.location.origin &&
				linkUrl.pathname === window.location.pathname &&
				Boolean(linkUrl.hash);

			if (isSamePageAnchor) {
				event.preventDefault();
				const target = document.querySelector(linkUrl.hash);
				closeMenu(false);
				window.requestAnimationFrame(function () {
					if (target) {
						target.querySelectorAll('[data-reveal]').forEach(function (item) {
							item.classList.add('is-visible');
						});
						scrollToTarget(target);
						window.history.replaceState(null, '', linkUrl.hash);
					}
				});
				return;
			}

			closeMenu(false);
		});

		document.addEventListener('keydown', function (event) {
			if (!body.classList.contains('menu-open')) {
				return;
			}

			if (event.key === 'Escape') {
				closeMenu(true);
				return;
			}

			if (event.key !== 'Tab') {
				return;
			}

			const focusable = getFocusableElements();
			if (!focusable.length) {
				return;
			}

			const first = focusable[0];
			const last = focusable[focusable.length - 1];

			if (event.shiftKey && document.activeElement === first) {
				event.preventDefault();
				last.focus();
			} else if (!event.shiftKey && document.activeElement === last) {
				event.preventDefault();
				first.focus();
			}
		});

		window.addEventListener('resize', function () {
			if (window.innerWidth > 860 && body.classList.contains('menu-open')) {
				closeMenu(false);
			}
		});
	}

	document.querySelectorAll('a[href^="#"]').forEach(function (link) {
		if (link.closest('.primary-navigation') || link.hasAttribute('data-discipline-link')) {
			return;
		}

		link.addEventListener('click', function (event) {
			const targetId = link.getAttribute('href');
			if (!targetId || targetId === '#') {
				return;
			}

			const target = document.querySelector(targetId);
			if (!target) {
				return;
			}

			event.preventDefault();
			scrollToTarget(target);
			window.history.replaceState(null, '', targetId);
		});
	});

	if (header) {
		const updateHeader = function () {
			header.classList.toggle('is-scrolled', window.scrollY > 36);
		};

		updateHeader();
		window.addEventListener('scroll', updateHeader, { passive: true });
	}

	const revealItems = document.querySelectorAll('[data-reveal]');
	if (!hasGsap && revealItems.length && !reduceMotion && 'IntersectionObserver' in window) {
		documentRoot.classList.add('reveal-ready');
		const revealObserver = new IntersectionObserver(
			function (entries, observer) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-visible');
						observer.unobserve(entry.target);
					}
				});
			},
			{ rootMargin: '0px 0px -7% 0px', threshold: 0.08 }
		);

		revealItems.forEach(function (item) {
			revealObserver.observe(item);
		});

		let revealFrame = null;
		const revealVisibleItems = function () {
			revealItems.forEach(function (item) {
				if (item.classList.contains('is-visible')) {
					return;
				}
				const rect = item.getBoundingClientRect();
				if (rect.top < window.innerHeight * 0.94 && rect.bottom > 0) {
					item.classList.add('is-visible');
				}
			});
			revealFrame = null;
		};

		const requestRevealCheck = function () {
			if (!revealFrame) {
				revealFrame = window.requestAnimationFrame(revealVisibleItems);
			}
		};

		revealVisibleItems();
		window.addEventListener('scroll', requestRevealCheck, { passive: true });
		window.addEventListener('resize', requestRevealCheck);
	}

	const parallaxItems = Array.from(document.querySelectorAll('[data-parallax]'));
	if (!hasGsap && parallaxItems.length && !reduceMotion) {
		let parallaxFrame = null;

		const updateParallax = function () {
			const viewportCenter = window.innerHeight / 2;
			parallaxItems.forEach(function (item) {
				const rect = item.getBoundingClientRect();
				if (rect.bottom < 0 || rect.top > window.innerHeight) {
					return;
				}
				const speed = Number.parseFloat(item.dataset.parallax || '0.15');
				const offset = (rect.top + rect.height / 2 - viewportCenter) * speed;
				item.style.setProperty('--parallax-y', offset.toFixed(2) + 'px');
			});
			parallaxFrame = null;
		};

		const requestParallax = function () {
			if (!parallaxFrame) {
				parallaxFrame = window.requestAnimationFrame(updateParallax);
			}
		};

		updateParallax();
		window.addEventListener('scroll', requestParallax, { passive: true });
		window.addEventListener('resize', requestParallax);
	}

	if (disciplineArea) {
		const disciplineTriggers = Array.from(disciplineArea.querySelectorAll('[data-discipline-trigger]'));
		const disciplinePanels = Array.from(disciplineArea.querySelectorAll('[data-discipline-panel]'));
		const disciplineLinks = Array.from(document.querySelectorAll('[data-discipline-link]'));
		const supportsHover = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
		function setDiscipline(name) {
			disciplineTriggers.forEach(function (trigger) {
				const isActive = trigger.dataset.disciplineTrigger === name;
				trigger.classList.toggle('is-active', isActive);
				trigger.setAttribute('aria-expanded', isActive ? 'true' : 'false');
			});

			disciplinePanels.forEach(function (panel) {
				const isActive = panel.dataset.disciplinePanel === name;
				panel.classList.toggle('is-active', isActive);
				panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');
			});

		}

		const requestedDiscipline = window.location.hash.match(/^#discipline-(design|motion|sound)$/);
		setDiscipline(requestedDiscipline ? requestedDiscipline[1] : 'design');

		disciplineTriggers.forEach(function (trigger) {
			const name = trigger.dataset.disciplineTrigger;

			trigger.addEventListener('pointerenter', function () {
				if (supportsHover) {
					setDiscipline(name);
				}
			});

			trigger.addEventListener('focus', function () {
				setDiscipline(name);
			});

			trigger.addEventListener('click', function () {
				setDiscipline(name);
				if (!supportsHover) {
					scrollToTarget(disciplineArea);
				}
			});
		});

		disciplineLinks.forEach(function (link) {
			link.addEventListener('click', function (event) {
				const name = link.dataset.disciplineLink;
				if (!name) {
					return;
				}

				event.preventDefault();
				setDiscipline(name);
				scrollToTarget(disciplineArea);
				window.history.replaceState(null, '', '#discipline-' + name);
			});
		});

		disciplineArea.addEventListener('mouseleave', function () {
			if (supportsHover) {
				setDiscipline('design');
			}
		});

		disciplineArea.addEventListener('focusout', function (event) {
			if (!disciplineArea.contains(event.relatedTarget)) {
				setDiscipline('design');
			}
		});

		disciplineArea.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				setDiscipline('design');
			}
		});
	}

	function updateVideoButton(isPaused) {
		if (!videoButton || !videoButtonLabel) {
			return;
		}

		videoButton.setAttribute('aria-pressed', isPaused ? 'true' : 'false');
		videoButtonLabel.textContent = isPaused ? 'Video abspielen' : 'Video pausieren';
		const symbol = videoButton.querySelector('[aria-hidden="true"]');
		if (symbol) {
			symbol.textContent = isPaused ? '▶' : 'Ⅱ';
		}
	}

	if (heroVideo && videoButton) {
		if (reduceMotion) {
			heroVideo.pause();
			updateVideoButton(true);
		}

		videoButton.addEventListener('click', function () {
			if (heroVideo.paused) {
				heroVideo.play().then(function () {
					updateVideoButton(false);
				}).catch(function () {
					updateVideoButton(true);
				});
			} else {
				heroVideo.pause();
				updateVideoButton(true);
			}
		});
	}
})();
