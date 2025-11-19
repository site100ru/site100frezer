<?php
// Получаем ID сделки от Bitrix24
$placementOptions = json_decode($_REQUEST['PLACEMENT_OPTIONS'], true);
$dealId = $placementOptions['ID'];
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Документы сделки</title>
		<script src="//api.bitrix24.com/api/v1/"></script>

		<style>
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body {
				font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
				background: #ffffff;
				padding: 20px;
				color: #333;
			}

			h2 {
				font-size: 20px;
				margin-bottom: 20px;
				color: #333;
				border-bottom: 1px solid #e0e0e0;
				padding-bottom: 15px;
			}

			.document-section {
				background: #f7f8fa;
				border-radius: 8px;
				padding: 20px;
				margin-bottom: 20px;
			}

			.document-section h3 {
				font-size: 16px;
				margin-bottom: 15px;
				color: #333;
			}

			.checkbox-container {
				display: flex;
				align-items: center;
				gap: 10px;
				margin-bottom: 15px;
				padding: 12px;
				background: #fff;
				border-radius: 4px;
				border: 1px solid #e0e0e0;
			}

			.checkbox-container input[type="checkbox"] {
				width: 18px;
				height: 18px;
				cursor: pointer;
			}

			.checkbox-container label {
				cursor: pointer;
				font-size: 14px;
				user-select: none;
			}

			.actions {
				display: flex;
				gap: 15px;
				flex-wrap: wrap;
			}

			.btn {
				background: #2fc6f6;
				color: white;
				border: none;
				padding: 12px 24px;
				border-radius: 4px;
				font-size: 14px;
				font-weight: 500;
				cursor: pointer;
				transition: background 0.2s;
			}

			.btn:hover {
				background: #1eb5e6;
			}

			.btn:disabled {
				background: #ccc;
				cursor: not-allowed;
			}

			.btn-passport {
				background: #4caf50;
			}

			.btn-passport:hover {
				background: #45a049;
			}

			.btn-certificate {
				background: #ff9800;
			}

			.btn-certificate:hover {
				background: #f57c00;
			}

			.message {
				padding: 12px 16px;
				border-radius: 4px;
				margin: 15px 0;
				display: none;
				font-size: 14px;
			}

			.message.show {
				display: block;
			}

			.message.success {
				background: #d4f4dd;
				color: #0c6e23;
				border: 1px solid #b8edc7;
			}

			.message.error {
				background: #ffd6d6;
				color: #c70000;
				border: 1px solid #ffb8b8;
			}

			.message.info {
				background: #e3f2fd;
				color: #1565c0;
				border: 1px solid #90caf9;
			}

			.loading {
				text-align: center;
				padding: 40px;
				color: #999;
				font-style: italic;
			}

			.warning-text {
				color: #f57c00;
				font-size: 13px;
				margin-top: 5px;
				padding-left: 28px;
			}
		</style>
	</head>

	<body>
		<h2>📄 Создание документов для сделки #<?= $dealId ?></h2>

		<div id="message" class="message"></div>

		<div id="loading" class="loading" style="display: none;">
			Загрузка...
		</div>

		<div class="document-section">
			<h3>🛂 Загранпаспорт</h3>

			<div class="checkbox-container">
				<input type="checkbox" id="firstIsTouristPassport" checked>
				<label for="firstIsTouristPassport">Первый контакт — турист (включать в документ)</label>
			</div>
			<div class="warning-text" id="warningPassport" style="display: none;">
				⚠️ Первый контакт будет временно исключен при создании документа
			</div>

			<div class="checkbox-container">
				<input type="checkbox" id="regeneratePassport">
				<label for="regeneratePassport">Перегенерировать документ (использовать старую нумерацию)</label>
			</div>
			<div class="warning-text" id="regenerateHintPassport" style="display: none; color: #1565c0;">
				ℹ️ Будет использован номер предыдущего документа
			</div>

            <div class="checkbox-container">
                <input type="checkbox" id="kazakhPassport">
                <label for="kazakhPassport">Договор на Казахском языке</label>
            </div>

			<div class="actions">
				<button class="btn btn-passport" onclick="createPassportDocument()" id="btnPassport">
					Создать документ — Загранпаспорт
				</button>
			</div>
		</div>

		<div class="document-section">
			<h3>🪪 Удостоверение</h3>

			<div class="checkbox-container">
				<input type="checkbox" id="firstIsTouristCertificate" checked>
				<label for="firstIsTouristCertificate">Первый контакт — турист (включать в документ)</label>
			</div>
			<div class="warning-text" id="warningCertificate" style="display: none;">
				⚠️ Первый контакт будет временно исключен при создании документа
			</div>

			<div class="checkbox-container">
				<input type="checkbox" id="regenerateCertificate">
				<label for="regenerateCertificate">Перегенерировать документ (использовать старую нумерацию)</label>
			</div>
			<div class="warning-text" id="regenerateHintCertificate" style="display: none; color: #1565c0;">
				ℹ️ Будет использован номер предыдущего документа
			</div>

            <div class="checkbox-container">
                <input type="checkbox" id="kazakhCertificate">
                <label for="kazakhCertificate">Договор на Казахском языке</label>
            </div>

			<div class="actions">
				<button class="btn btn-certificate" onclick="createCertificateDocument()" id="btnCertificate">
					Создать документ — Удостоверение
				</button>
			</div>
		</div>

		<div class="document-section">
			<h3>🏨 Документ — Только Отель</h3>

			<div class="checkbox-container">
				<input type="checkbox" id="firstIsTouristHotel" checked>
				<label for="firstIsTouristHotel">Первый контакт — турист (включать в документ)</label>
			</div>
			<div class="warning-text" id="warningHotel" style="display: none;">
				⚠️ Первый контакт будет временно исключен при создании документа
			</div>

			<div class="checkbox-container">
				<input type="checkbox" id="regenerateHotel">
				<label for="regenerateHotel">Перегенерировать документ (использовать старую нумерацию)</label>
			</div>
			<div class="warning-text" id="regenerateHintHotel" style="display: none; color: #1565c0;">
				ℹ️ Будет использован номер предыдущего документа
			</div>

            <div class="checkbox-container">
                <input type="checkbox" id="kazakhHotel">
                <label for="kazakhHotel">Договор на Казахском языке</label>
            </div>

			<div class="actions">
				<button class="btn btn-certificate" onclick="createHotelDocument()" id="btnHotel">
					Создать документ — Только Отель
				</button>
			</div>
		</div>



		<script>
			const DEAL_ID = <?= $dealId ?>;

			// ID шаблонов
			const TEMPLATE_IDS = {
				PASSPORT: 65, // ЗАГРАН
                PASSPORT_KZ: 120,   // Казахский шаблон (добавишь сам)


				CERTIFICATE: 61, // УДОСТОВЕРЕНИЕ
                CERTIFICATE_KZ: 121,


				HOTEL: 63, // ОТЕЛЬ
                HOTEL_KZ: 122
			};

			let dealContacts = [];

			// Инициализация
			BX24.init(function() {
				console.log('Bitrix24 initialized. Deal ID:', DEAL_ID);
				console.log('Using template IDs:', TEMPLATE_IDS);
			});

			// Отслеживаем изменение чекбоксов
			document.getElementById('firstIsTouristPassport').addEventListener('change', function(e) {
				document.getElementById('warningPassport').style.display = e.target.checked ? 'none' : 'block';
			});

			document.getElementById('firstIsTouristCertificate').addEventListener('change', function(e) {
				document.getElementById('warningCertificate').style.display = e.target.checked ? 'none' : 'block';
			});

			document.getElementById('regeneratePassport').addEventListener('change', function(e) {
				const hint = document.getElementById('regenerateHintPassport');
				hint.style.display = e.target.checked ? 'block' : 'none';
			});

			document.getElementById('regenerateCertificate').addEventListener('change', function(e) {
				const hint = document.getElementById('regenerateHintCertificate');
				hint.style.display = e.target.checked ? 'block' : 'none';
			});

			document.getElementById('firstIsTouristHotel').addEventListener('change', function(e) {
				document.getElementById('warningHotel').style.display = e.target.checked ? 'none' : 'block';
			});

			document.getElementById('regenerateHotel').addEventListener('change', function(e) {
				const hint = document.getElementById('regenerateHintHotel');
				hint.style.display = e.target.checked ? 'block' : 'none';
			});


			// Получаем контакты сделки
			function getDealContacts() {
				return new Promise((resolve, reject) => {
					BX24.callMethod(
						'crm.deal.contact.items.get', {
							id: DEAL_ID
						},
						function(result) {
							if (result.error()) {
								reject(result.error());
							} else {
								const contacts = result.data() || [];
								console.log('Deal contacts:', contacts);
								resolve(contacts);
							}
						}
					);
				});
			}

			// Удаляем все контакты из сделки
			function removeAllContacts(contacts) {
				return new Promise((resolve, reject) => {
					const batch = {};

					contacts.forEach((contact, index) => {
						batch['delete_' + index] = [
							'crm.deal.contact.delete',
							{
								id: DEAL_ID,
								fields: {
									CONTACT_ID: contact.CONTACT_ID
								}
							}
						];
					});

					if (Object.keys(batch).length === 0) {
						resolve();
						return;
					}

					BX24.callBatch(batch, function(result) {
						console.log('Contacts removed:', result);
						resolve();
					});
				});
			}

			// Добавляем контакты обратно в сделку
			function restoreContacts(contacts) {
				return new Promise((resolve, reject) => {
					const batch = {};

					contacts.forEach((contact, index) => {
						batch['add_' + index] = [
							'crm.deal.contact.add',
							{
								id: DEAL_ID,
								fields: {
									CONTACT_ID: contact.CONTACT_ID,
									SORT: contact.SORT || (index * 10),
									IS_PRIMARY: contact.IS_PRIMARY || 'N'
								}
							}
						];
					});

					if (Object.keys(batch).length === 0) {
						resolve();
						return;
					}

					BX24.callBatch(batch, function(result) {
						console.log('Contacts restored:', result);
						resolve();
					});
				});
			}

			// Ждем генерацию PDF и получаем данные
			function waitForPdfGeneration(documentId, maxAttempts = 10) {
				return new Promise((resolve, reject) => {
					let attempts = 0;

					const checkPdf = () => {
						attempts++;
						console.log(`Checking PDF, attempt ${attempts}/${maxAttempts}`);

						BX24.callMethod(
							'crm.documentgenerator.document.get', {
								id: documentId
							},
							function(result) {
								if (result.error()) {
									console.error('Error getting document:', result.error());
									reject(result.error());
									return;
								}

								const doc = result.data().document || result.data();
								console.log('Document info:', doc);

								const pdfUrl = doc.pdfUrl || doc.pdfUrlMachine || doc.pdf;

								// Проверяем что PDF готов
								if (pdfUrl && doc.pdfUrl) {
									console.log('PDF ready! PdfUrl:', pdfUrl);
									resolve({
										pdfUrl,
										doc
									});
									return;
								}

								// Если PDF еще не готов и есть попытки - ждем и проверяем снова
								if (attempts < maxAttempts) {
									const nextCheck = attempts === 1 ? 3000 : 5000;
									showMessage(`⏳ Ожидание генерации PDF... (попытка ${attempts}/${maxAttempts})`, 'info');
									setTimeout(checkPdf, nextCheck);
								} else {
									console.warn('PDF not ready after max attempts');
									reject('PDF генерируется слишком долго. Попробуйте позже.');
								}
							}
						);
					};

					checkPdf();
				});
			}

			// Создаем документ загранпаспорт
			async function createPassportDocument() {
				if (!TEMPLATE_IDS.PASSPORT) {
					showMessage('❌ Шаблон загранпаспорта не найден', 'error');
					return;
				}

                const isKazakh = document.getElementById('kazakhPassport').checked;
				const firstIsTourist = document.getElementById('firstIsTouristPassport').checked;
				const regenerate = document.getElementById('regeneratePassport').checked;

                const templateId = isKazakh ? TEMPLATE_IDS.PASSPORT_KZ : TEMPLATE_IDS.PASSPORT;

                await createDocument(templateId, 'Загранпаспорт', firstIsTourist, 'btnPassport', regenerate);
			}

			// Создаем документ удостоверение
			async function createCertificateDocument() {
				if (!TEMPLATE_IDS.CERTIFICATE) {
					showMessage('❌ Шаблон удостоверения не найден', 'error');
					return;
				}

                const isKazakh = document.getElementById('kazakhCertificate').checked;
				const firstIsTourist = document.getElementById('firstIsTouristCertificate').checked;
				const regenerate = document.getElementById('regenerateCertificate').checked;

                const templateId = isKazakh ? TEMPLATE_IDS.CERTIFICATE_KZ : TEMPLATE_IDS.CERTIFICATE;

                await createDocument(templateId, 'Удостоверение', firstIsTourist, 'btnCertificate', regenerate);
            }

			async function createHotelDocument() {
				if (!TEMPLATE_IDS.HOTEL) {
					showMessage('❌ Шаблон "Только Отель" не найден', 'error');
					return;
				}

                const isKazakh = document.getElementById('kazakhHotel').checked;
				const firstIsTourist = document.getElementById('firstIsTouristHotel').checked;
				const regenerate = document.getElementById('regenerateHotel').checked;

                const templateId = isKazakh ? TEMPLATE_IDS.HOTEL_KZ : TEMPLATE_IDS.HOTEL;

                await createDocument(templateId, 'Только Отель', firstIsTourist, 'btnHotel', regenerate);
			}


			async function createDocument(templateId, documentType, firstIsTourist, btnId, useOldNumber = false) {
				// === Проверка обязательных полей сделки ===
				showMessage(`⏳ Проверка данных сделки...`, 'info');

				const deal = await new Promise((resolve, reject) => {
					BX24.callMethod('crm.deal.get', { id: DEAL_ID }, function(result) {
						if (result.error()) reject(result.error());
						else resolve(result.data());
					});
				});

				// Проверяем оба поля
				const fieldA = deal.UF_CRM_1759145475582;
				const fieldB = deal.UF_CRM_1759464545616;

				if (!fieldA) {
					showMessage('❌ Поле UF_CRM_1759145475582 не заполнено!', 'error');
					btn.disabled = false;
					btn.textContent = `Создать документ — ${documentType}`;
					document.getElementById('loading').style.display = 'none';
					return;
				}

				// Если UF_CRM_1759464545616 пустое → временно переключаем стадию
				let previousStage = deal.STAGE_ID;

				if (!fieldB) {
					showMessage('⚠️ Поле UF_CRM_1759464545616 не заполнено. Выполняется переключение стадии...', 'info');

					// 1) Переключаем на PREPARATION
					await new Promise((resolve) => {
						BX24.callMethod('crm.deal.update', {
							id: DEAL_ID,
							fields: { STAGE_ID: "PREPARATION" }
						}, function() {
							resolve();
						});
					});

					// 2) Возвращаем обратно
					await new Promise((resolve) => {
						BX24.callMethod('crm.deal.update', {
							id: DEAL_ID,
							fields: { STAGE_ID: previousStage }
						}, function() {
							resolve();
						});
					});

					showMessage('ℹ️ Стадия временно переключена и восстановлена.', 'info');
				}


				const btn = document.getElementById(btnId);
				btn.disabled = true;
				btn.textContent = 'Создание...';
				document.getElementById('loading').style.display = 'block';

				console.log('=== START CREATE DOCUMENT ===');
				console.log('Template ID:', templateId);
				console.log('Deal ID:', DEAL_ID);
				console.log('useOldNumber:', useOldNumber);

				try {
					showMessage(`⏳ Шаг 1/5: Получение контактов сделки...`, 'info');
					dealContacts = await getDealContacts();

					if (dealContacts.length === 0) {
						showMessage('⚠️ В сделке нет контактов', 'error');
						return;
					}

					// Временное исключение первого контакта (если нужно)
					let contactsToRestore = [...dealContacts];
					if (!firstIsTourist && dealContacts.length > 0) {
						await removeAllContacts(dealContacts);
						const contactsWithoutFirst = dealContacts.slice(1);
						await restoreContacts(contactsWithoutFirst);
					}

					// === Поиск старого документа для получения номера ===
					let oldDocumentNumber = null;
					let lastDocId = null;

					if (useOldNumber) {
						showMessage(`🔍 Шаг 2/5: Поиск последнего документа...`, 'info');

						try {
							const docsList = await new Promise((resolve, reject) => {
								BX24.callMethod(
									'crm.documentgenerator.document.list', {
										filter: {
											entityTypeId: 2,
											entityId: DEAL_ID,
											templateId: templateId
										},
										order: {
											id: 'desc'
										},
										select: ['id', 'number', 'title', 'createTime']
									},
									function(result) {
										if (result.error()) reject(result.error());
										else resolve(result.data()?.documents || result.data());
									}
								);
							});

							console.log('📄 Documents list:', docsList);

							if (Array.isArray(docsList) && docsList.length > 0) {
								const lastDoc = docsList[0];
								oldDocumentNumber = lastDoc.number;
								lastDocId = lastDoc.id;
								console.log('✅ Found previous document #' + oldDocumentNumber);
								showMessage(`ℹ️ Найден документ №${oldDocumentNumber} - "${lastDoc.title}"`, 'info');

								// Удаляем старый документ
								showMessage(`🗑️ Удаление старого документа...`, 'info');
								await new Promise((resolve, reject) => {
									BX24.callMethod('crm.documentgenerator.document.delete', {
										id: lastDocId
									}, function(r) {
										if (r.error()) {
											console.warn('⚠️ Не удалось удалить:', r.error());
										} else {
											console.log('✅ Старый документ удалён');
										}
										resolve(); // Продолжаем в любом случае
									});
								});
							} else {
								showMessage(`⚠️ Предыдущие документы не найдены`, 'info');
							}
						} catch (err) {
							console.error('❌ Error:', err);
							showMessage(`⚠️ Ошибка поиска: ${err}`, 'info');
						}
					}

					// === Создание нового документа ===
					showMessage(`⏳ Шаг 3/5: Создание документа "${documentType}"...`, 'info');

					const createParams = {
						templateId: templateId,
						entityTypeId: 2,
						entityId: DEAL_ID
					};

					// КЛЮЧЕВОЙ МОМЕНТ: передаём старый номер через values!
					if (oldDocumentNumber) {
						createParams.values = {
							'DocumentNumber': oldDocumentNumber
						};
						showMessage(`🔢 Будет использован номер: ${oldDocumentNumber}`, 'info');
						console.log('📌 Setting DocumentNumber in values:', oldDocumentNumber);
					}

					const documentResult = await new Promise((resolve, reject) => {
						BX24.callMethod('crm.documentgenerator.document.add', createParams, function(result) {
							if (result.error()) {
								reject(result.error());
							} else {
								console.log('✅ Document created:', result.data());
								resolve(result.data());
							}
						});
					});

					// === Восстановление контактов ===
					showMessage(`⏳ Шаг 4/5: Восстановление контактов...`, 'info');
					if (!firstIsTourist && dealContacts.length > 0) {
						const currentContacts = await getDealContacts();
						await removeAllContacts(currentContacts);
						await restoreContacts(contactsToRestore);
					}

					// === Проверка PDF ===
					const doc = documentResult.document || documentResult;
					const documentId = doc.id;
					showMessage(`⏳ Шаг 5/5: Ожидание генерации PDF...`, 'info');

					try {
						const pdfData = await waitForPdfGeneration(documentId);
						const downloadUrl = pdfData.pdfUrl || pdfData.doc.pdfUrl || pdfData.doc.downloadUrl;

						showMessage(
							`✅ Документ "${doc.title}" (№${doc.number}) успешно создан! ` +
							`<a href="${downloadUrl}" target="_blank" style="color:#0c6e23;text-decoration:underline;font-weight:600;">Скачать PDF</a>`,
							'success'
						);
					} catch (pdfError) {
						console.warn('PDF not ready:', pdfError);
						showMessage(
							`✅ Документ "${doc.title}" (№${doc.number}) создан, PDF генерируется...`,
							'success'
						);
					}
				} catch (error) {
					console.error('Error:', error);
					showMessage(`❌ Ошибка: ${error}`, 'error');
				} finally {
					btn.disabled = false;
					btn.textContent = `Создать документ — ${documentType}`;
					document.getElementById('loading').style.display = 'none';
				}
			}

			// Показываем сообщение
			function showMessage(text, type) {
				const messageEl = document.getElementById('message');
				messageEl.innerHTML = text;
				messageEl.className = 'message ' + type + ' show';
			}
		</script>
	</body>

</html>