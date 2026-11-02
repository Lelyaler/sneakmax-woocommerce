/**
 * Sneakmax Theme Gutenberg Blocks
 * Native React block editor registration
 */

(function (wp) {
	'use strict';

	if (!wp || !wp.blocks || !wp.element) {
		return;
	}

	const { registerBlockType } = wp.blocks;
	const { createElement: el, Fragment } = wp.element;
	const { InspectorControls } = wp.blockEditor || wp.editor;
	const { PanelBody, TextControl, RangeControl } = wp.components;
	const { __ } = wp.i18n;

	// 1. Quiz Block
	registerBlockType('sneakmax/quiz', {
		edit: function (props) {
			const { attributes, setAttributes } = props;
			const { title, subtitle } = attributes;

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __('Параметры квиза', 'sneakmax'), initialOpen: true },
						el(TextControl, {
							label: __('Заголовок', 'sneakmax'),
							value: title,
							onChange: (val) => setAttributes({ title: val }),
						}),
						el(TextControl, {
							label: __('Подзаголовок', 'sneakmax'),
							value: subtitle,
							onChange: (val) => setAttributes({ subtitle: val }),
						})
					)
				),
				el(
					'div',
					{
						style: {
							padding: '1.5rem',
							border: '2px dashed #484283',
							borderRadius: '8px',
							background: '#f8f8fb',
							textAlign: 'center',
						},
					},
					el('span', {
						style: {
							display: 'inline-block',
							background: '#484283',
							color: '#fff',
							padding: '0.2rem 0.6rem',
							borderRadius: '4px',
							fontSize: '0.75rem',
							fontWeight: 'bold',
							marginBottom: '0.5rem',
						},
					}, 'SNEAKMAX THEME BLOCK'),
					el('h3', { style: { margin: '0.25rem 0 0.5rem', color: '#444' } }, title || 'Подбор идеальной пары — Квиз'),
					el('p', { style: { margin: 0, color: '#777', fontSize: '0.9rem' } }, subtitle),
					el('p', { style: { marginTop: '1rem', fontSize: '0.8rem', color: '#999' } },
						'✔ 3 шага подбора: выбор типа, размера, пожеланий и контактная форма (SSR Dynamic Render)'
					)
				)
			);
		},
		save: function () {
			return null;
		},
	});

	// 2. Catalog Block
	registerBlockType('sneakmax/catalog', {
		edit: function (props) {
			const { attributes, setAttributes } = props;
			const { title, postsPerPage } = attributes;

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __('Настройки каталога', 'sneakmax'), initialOpen: true },
						el(TextControl, {
							label: __('Заголовок секции', 'sneakmax'),
							value: title,
							onChange: (val) => setAttributes({ title: val }),
						}),
						el(RangeControl, {
							label: __('Количество товаров на странице', 'sneakmax'),
							value: postsPerPage,
							onChange: (val) => setAttributes({ postsPerPage: val }),
							min: 3,
							max: 24,
							step: 3,
						})
					)
				),
				el(
					'div',
					{
						style: {
							padding: '1.5rem',
							border: '2px dashed #e14141',
							borderRadius: '8px',
							background: '#fff9f9',
							textAlign: 'center',
						},
					},
					el('span', {
						style: {
							display: 'inline-block',
							background: '#e14141',
							color: '#fff',
							padding: '0.2rem 0.6rem',
							borderRadius: '4px',
							fontSize: '0.75rem',
							fontWeight: 'bold',
							marginBottom: '0.5rem',
						},
					}, 'SNEAKMAX THEME BLOCK'),
					el('h3', { style: { margin: '0.25rem 0 0.5rem', color: '#444' } }, title || 'Каталог кроссовок Sneakmax'),
					el('p', { style: { margin: 0, color: '#777', fontSize: '0.85rem' } },
						`Вывод товаров: ${postsPerPage} шт. с AJAX-фильтрами по цене/полу и модалкой быстрого просмотра`
					)
				)
			);
		},
		save: function () {
			return null;
		},
	});

	// 3. FAQ Block
	registerBlockType('sneakmax/faq', {
		edit: function (props) {
			const { attributes, setAttributes } = props;
			const { title } = attributes;

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __('Настройки FAQ', 'sneakmax'), initialOpen: true },
						el(TextControl, {
							label: __('Заголовок', 'sneakmax'),
							value: title,
							onChange: (val) => setAttributes({ title: val }),
						})
					)
				),
				el(
					'div',
					{
						style: {
							padding: '1.5rem',
							border: '2px dashed #484283',
							borderRadius: '8px',
							background: '#f8f8fb',
							textAlign: 'center',
						},
					},
					el('span', {
						style: {
							display: 'inline-block',
							background: '#484283',
							color: '#fff',
							padding: '0.2rem 0.6rem',
							borderRadius: '4px',
							fontSize: '0.75rem',
							fontWeight: 'bold',
							marginBottom: '0.5rem',
						},
					}, 'SNEAKMAX THEME BLOCK'),
					el('h3', { style: { margin: '0.25rem 0 0.5rem', color: '#444' } }, title || 'Часто задаваемые вопросы'),
					el('p', { style: { margin: 0, color: '#777', fontSize: '0.85rem' } },
						'Интерактивный аккордеон с ответами на частые вопросы по доставке, возврату и оригинальности'
					)
				)
			);
		},
		save: function () {
			return null;
		},
	});
})(window.wp);
