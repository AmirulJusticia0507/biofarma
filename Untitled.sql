CREATE TABLE `vendor_status` (
  `id` integer,
  `name` varchar(64)
);

CREATE TABLE `vendor_process_status` (
  `id` integer,
  `name` varchar(64)
);

CREATE TABLE `vendor_profile` (
  `id` integer,
  `name` varchar(20)
);

CREATE TABLE `vendor` (
  `vendor_id` varchar(6),
  `vendor_name` varchar(200),
  `vendor_status_id` smallint,
  `vendor_profile_id` smallint,
  `company_id` varchar(20),
  `company_name` varchar(50),
  `initial_company` varchar(20),
  `founded` smallint,
  `company_adress` varchar(200),
  `phone_number` varchar(20),
  `fax_number` varchar(20),
  `website_address` varchar(50),
  `email_address` varchar(50),
  `contact_person` varchar(50),
  `company_head_office_id` varchar(20),
  `company_head_office_name` varchar(50),
  `company_head_office_address` varchar(200),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `vendor_process` (
  `id` int,
  `vendor_id` varchar(6),
  `vendor_name` varchar(200),
  `vendor_process_status_id` smallint,
  `vendor_profile_id` smallint,
  `company_id` varchar(20),
  `company_name` varchar(50),
  `initial_company` varchar(20),
  `founded` smallint,
  `company_adress` varchar(200),
  `phone_number` varchar(20),
  `fax_number` varchar(20),
  `website_address` varchar(50),
  `email_address` varchar(50),
  `contact_person` varchar(50),
  `company_head_office_id` varchar(20),
  `company_head_office_name` varchar(50),
  `company_head_office_address` varchar(200),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `vendor_process_attachment` (
  `vendor_id` varchar(6),
  `company_profile_name` varchar(64),
  `company_profile_filename` varchar(64),
  `manual_mutu_vendor_name` varchar(64),
  `manual_mutu_vendor_filename` varchar(64),
  `fasilitas_dan_proses_produksi_name` varchar(64),
  `fasilitas_dan_proses_produksi_filename` varchar(64),
  `daftar_konsumen_name` varchar(64),
  `daftar_konsumen_filename` varchar(64),
  `copy_sertifikasi_cgmp_dari_nra_name` varchar(64),
  `copy_sertifikasi_cgmp_dari_nra_filename` varchar(64),
  `copy_sertifikasi_iso_name` varchar(64),
  `copy_sertifikasi_iso_filename` varchar(64),
  `keterangan_bebas_bse_tse_name` varchar(64),
  `keterangan_bebas_bse_tse_filename` varchar(64),
  `copy_sertifikasi_kualitas_lainnya_name` varchar(64),
  `copy_sertifikasi_kualitas_lainnya_filename` varchar(64),
  `review_kuisioner_mutu_name` varchar(64),
  `review_kuisioner_mutu_filename` varchar(64),
  `review_kuisioner_mutu_pdf_name` varchar(64),
  `review_kuisioner_mutu_pdf_filename` varchar(64),
  `other_document_name` varchar(64),
  `other_document_filename` varchar(64)
);

CREATE TABLE `vendor_item_level_group` (
  `id` int,
  `name` varchar(16)
);

CREATE TABLE `vendor_item_level` (
  `id` int,
  `name` varchar(128)
);

CREATE TABLE `vendor_item_status` (
  `id` int,
  `name` varchar(64)
);

CREATE TABLE `vendor_item_service_category` (
  `id` int,
  `name` varchar(64)
);

CREATE TABLE `vendor_process_products` (
  `id` int,
  `vendor_processs_id` int,
  `vendor_item_status` int,
  `vendor_item_level_id` int,
  `item_name` varchar(64),
  `catalog_number` varchar(64),
  `packaging` varchar(50),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `vendor_item_service_type` (
  `id` int,
  `name` varchar(64)
);

CREATE TABLE `vendor_process_services_service_type` (
  `vendor_item_service_type_id` int,
  `vendor_process_services_id` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `vendor_process_services` (
  `id` int,
  `vendor_processs_id` int,
  `vendor_item_status` int,
  `vendor_item_level_id` int,
  `service_id` varchar(64),
  `vendor_item_service_category_id` int,
  `service_description` varchar(200),
  `equipment_group_id` varchar(20),
  `created_at` datetime,
  `updated_at` datetime
);

ALTER TABLE `vendor` ADD FOREIGN KEY (`vendor_status_id`) REFERENCES `vendor_status` (`id`);

ALTER TABLE `vendor` ADD FOREIGN KEY (`vendor_profile_id`) REFERENCES `vendor_profile` (`id`);

ALTER TABLE `vendor_process` ADD FOREIGN KEY (`vendor_process_status_id`) REFERENCES `vendor_process_status` (`id`);

ALTER TABLE `vendor_process` ADD FOREIGN KEY (`vendor_profile_id`) REFERENCES `vendor_profile` (`id`);

ALTER TABLE `vendor_process_attachment` ADD FOREIGN KEY (`vendor_id`) REFERENCES `vendor_process` (`vendor_id`);

ALTER TABLE `vendor_process_products` ADD FOREIGN KEY (`vendor_item_level_id`) REFERENCES `vendor_item_level` (`id`);

ALTER TABLE `vendor_process_products` ADD FOREIGN KEY (`vendor_processs_id`) REFERENCES `vendor_process` (`id`);

ALTER TABLE `vendor_process_products` ADD FOREIGN KEY (`vendor_item_status`) REFERENCES `vendor_item_status` (`id`);

ALTER TABLE `vendor_process_services_service_type` ADD FOREIGN KEY (`vendor_item_service_type_id`) REFERENCES `vendor_item_service_type` (`id`);

ALTER TABLE `vendor_process_services_service_type` ADD FOREIGN KEY (`vendor_process_services_id`) REFERENCES `vendor_process_services` (`id`);

ALTER TABLE `vendor_process_services` ADD FOREIGN KEY (`vendor_processs_id`) REFERENCES `vendor_process` (`id`);

ALTER TABLE `vendor_process_services` ADD FOREIGN KEY (`vendor_item_status`) REFERENCES `vendor_item_status` (`id`);

ALTER TABLE `vendor_process_services` ADD FOREIGN KEY (`vendor_item_level_id`) REFERENCES `vendor_item_level` (`id`);

ALTER TABLE `vendor_process_services` ADD FOREIGN KEY (`vendor_item_service_category_id`) REFERENCES `vendor_item_service_category` (`id`);
