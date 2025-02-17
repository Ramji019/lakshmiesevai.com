alter table users add cpassword varchar(10) DEFAULT NULL after password;
alter table users add profile varchar(10) DEFAULT NULL after cpassword;
alter table users add status varchar(10) DEFAULT NULL after profile;
alter table users add user_type_id varchar(10) DEFAULT NULL after name;
alter table users add gender varchar(10) DEFAULT NULL after user_type_id;
alter table users add phone varchar(10) DEFAULT NULL after gender;
alter table users add address varchar(10) DEFAULT NULL after phone;
alter table users add aadhaar_no varchar(10) DEFAULT NULL after address;
alter table users add date_of_birth varchar(10) DEFAULT NULL after aadhaar_no;
alter table users add status varchar(10) DEFAULT NULL after date_of_birth;
alter table users add wallet decimal(10,2) DEFAULT NULL after status;

CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT '0',
  `service_name` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(10)  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `cus_document` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(10) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `cus_docx` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

alter table users add refferal_id varchar(10) DEFAULT NULL after user_type_id;
alter table users modify wallet decimal(10,2) DEFAULT 0;

CREATE TABLE `applied_service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `customer_id` int(11) DEFAULT 0,
  `service_amount` decimal(10,2) DEFAULT 0,
  `status` varchar(20) DEFAULT NULL,
  `applied_date` varchar(20) DEFAULT NULL,
  `completed_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

alter table services add service_image varchar(10) DEFAULT NULL after service_name;

CREATE TABLE `service_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `distributor_amount` decimal(10,2) DEFAULT 0,
  `retailer_amount` decimal(10,2) DEFAULT 0,
  `customer_amount` decimal(10,2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


alter table users add aadhaar_file varchar(10) DEFAULT NULL after aadhaar_no;
alter table users add pan_no varchar(10) DEFAULT NULL after aadhaar_file;
alter table users add pan_file varchar(10) DEFAULT NULL after pan_no;


alter table msme add distributor_id int DEFAULT 0 after retailer_id;

22/10/2024

alter table msme modify acknowledgement varchar(20);

alter table tnega_services modify aadhaar_back varchar(20);
alter table tnega_services modify old_can_document varchar(20);
alter table tnega_services modify salary_slip varchar(20);
alter table tnega_services modify pancard varchar(20);
alter table tnega_services modify income_yearly varchar(20);
alter table tnega_services modify income_monthly varchar(20);
alter table tnega_services modify relationship varchar(20);
alter table tnega_services modify tc_community_certificate varchar(20);
alter table tnega_services modify income_certificate varchar(20);
alter table tnega_services modify community_certificate varchar(20);
alter table tnega_services modify birth_certificate varchar(20);
alter table tnega_services modify smartcard_online varchar(20);
alter table tnega_services modify voterid varchar(20);
alter table tnega_services modify driving_license varchar(20);
alter table tnega_services modify marksheet varchar(20);
alter table tnega_services modify mrg_invitation varchar(20);
alter table tnega_services modify deed varchar(20);
alter table tnega_services modify bank_pass_book varchar(20);
alter table tnega_services modify personal_strap varchar(20);
alter table tnega_services modify joint_strap varchar(20);
alter table tnega_services modify deed_details varchar(20);
alter table tnega_services modify deed_yes varchar(20);
alter table tnega_services modify hus_wife_photo varchar(20);
alter table tnega_services modify permanent_social_certificate_groom varchar(20);
alter table tnega_services modify bride_permanent_social_certificate varchar(20);
alter table tnega_services modify mrg_registration_certificate varchar(20);
alter table tnega_services modify anyothers_certificate varchar(20);
alter table tnega_services modify chitta varchar(20);
alter table tnega_services modify aggregation varchar(20);
alter table tnega_services modify ec_certificate varchar(20);
alter table tnega_services modify villankam varchar(20);
alter table tnega_services modify vao_certificate varchar(20);
alter table tnega_services modify self_declaration_certificate varchar(20);
alter table tnega_services modify other_certificate varchar(20);
alter table tnega_services modify passport varchar(20);
alter table tnega_services modify placement_registration varchar(20);
alter table tnega_services modify school_transfer_certificate varchar(20);
alter table tnega_services modify study_proof varchar(20);
alter table tnega_services modify family_income_certificate varchar(20);
alter table tnega_services modify acknowledgement varchar(20);

alter table tnega_services add mrg_docdetails varchar(30) DEFAULT NULL after mrg_documents;
alter table tnega_services add any_proof varchar(30) DEFAULT NULL after mrg_docdetails;
alter table tnega_services add age_proof varchar(30) DEFAULT NULL after smartcard_online;

alter table users add smartcard varchar(20) DEFAULT NULL after pan_file;
alter table users add signature varchar(20) DEFAULT NULL after smartcard;
alter table users add dist_id int(11) DEFAULT NULL after signature;
alter table users add taluk_id int(11) DEFAULT NULL after dist_id;
alter table users add panchayath_id int(11) DEFAULT NULL after taluk_id;
alter table users add can_details varchar(20) DEFAULT NULL after panchayath_id;
alter table users add can_number varchar(20) DEFAULT NULL after can_details;

alter table gst modify business_address varchar(200);
alter table gst add mobile varchar(20) after business_address;



alter table itr add email varchar(60) DEFAULT NULL after mobile;
alter table itr add aadhaar_no varchar(15) DEFAULT NULL after email;

CREATE TABLE tec_exam (
  id int(11) NOT NULL AUTO_INCREMENT,
  service_id int(11) DEFAULT 0,
  user_id int(11) DEFAULT 0,
  retailer_id int(11) DEFAULT 0,
  distributor_id int(11) DEFAULT 0,
  admin_id int(11) DEFAULT 0,
  amount decimal(10,2) DEFAULT 0.00,
  tec_number varchar(50) DEFAULT NULL,
  tec_password varchar(20) DEFAULT NULL,
  aadhaar_card varchar(20) DEFAULT NULL,
  photo varchar(20) DEFAULT NULL,
  acknowledgement varchar(20) DEFAULT NULL,
  status varchar(20) DEFAULT NULL,
  remarks varchar(100) DEFAULT NULL,
  application_no varchar(50) DEFAULT NULL,
  certificate varchar(20) DEFAULT NULL,
  applied_date varchar(10) DEFAULT NULL,
  completed_date varchar(10) DEFAULT NULL,
  created_at varchar(10) DEFAULT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB;

alter table tec_exam add applicant_name varchar(30) DEFAULT NULL after tec_password;
alter table tec_exam add mobile varchar(10) DEFAULT NULL after applicant_name;
alter table tec_exam add gender varchar(10) DEFAULT NULL after mobile;
alter table tec_exam add district varchar(15) DEFAULT NULL after gender;
alter table tec_exam add father_name varchar(30) DEFAULT NULL after district;
alter table tec_exam add email varchar(30) DEFAULT NULL after father_name;
alter table tec_exam add dob varchar(10) DEFAULT NULL after email;
alter table tec_exam add address varchar(200) DEFAULT NULL after dob;

//23/10/2024

CREATE TABLE `smartcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT '0',
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `pan_card` varchar(20) DEFAULT NULL,
  `smart_card` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `birth_certificate` varchar(20) DEFAULT NULL,
  `voter_id` varchar(20) DEFAULT NULL,
  `death_certificate` varchar(20) DEFAULT NULL,
  `mrg_certificate` varchar(20) DEFAULT NULL,
  `mrg_invitation` varchar(20) DEFAULT NULL,
  `passport` varchar(20) DEFAULT NULL,
  `electricity_bill_receipt` varchar(20) DEFAULT NULL,
  `telephone_charges` varchar(20) DEFAULT NULL,
  `gas_cylinder_receipt` varchar(20) DEFAULT NULL,
  `property_tax_applicant_owns_house` varchar(20) DEFAULT NULL,
  `lease_deed` varchar(20) DEFAULT NULL,
  `allotment_rder_of_slum_replacement_board` varchar(20) DEFAULT NULL,
  `bond_leave_proof` varchar(20) DEFAULT NULL,
  `first_page_of_bank_account_book` varchar(20) DEFAULT NULL,
  `name_tamil` varchar(20) DEFAULT NULL,
  `name_english` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `monthly_income` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB;

alter table smartcard add pin_code varchar(20) DEFAULT NULL after photo;
alter table smartcard add father_or_husband_english varchar(50) DEFAULT NULL after name_english;
alter table smartcard add father_or_husband_tamil varchar(50) DEFAULT NULL after name_tamil;
alter table smartcard add application_no varchar(50) DEFAULT NULL after acknowledgement;
alter table smartcard add any_document varchar(100) DEFAULT NULL after application_no;
alter table smartcard modify acknowledgement varchar(20);


alter table smartcard add bank_passbook varchar(50) DEFAULT NULL after passport;
alter table smartcard add family_head_name varchar(50) DEFAULT NULL after bank_passbook;
alter table smartcard add email_id varchar(50) DEFAULT NULL after family_head_name;
alter table smartcard add monthly_income varchar(50) DEFAULT NULL after email_id;
alter table smartcard add family_head_photo varchar(50) DEFAULT NULL after monthly_income;
alter table smartcard add address_tamil_1 varchar(50) DEFAULT NULL after family_head_photo;
alter table smartcard add address_tamil_2 varchar(50) DEFAULT NULL after address_tamil_1;
alter table smartcard add address_tamil_3 varchar(50) DEFAULT NULL after address_tamil_2;
alter table smartcard add address_english_1 varchar(50) DEFAULT NULL after address_tamil_3;
alter table smartcard add address_english_2 varchar(50) DEFAULT NULL after address_english_1;
alter table smartcard add address_english_3 varchar(50) DEFAULT NULL after address_english_2;
alter table smartcard add gas_connection_no varchar(50) DEFAULT NULL after address_english_3;

alter table tnega_services add distributor_id int DEFAULT 0 after retailer_id;
alter table smartcard add retailer_id int Default 0 after user_id;
alter table smartcard add distributor_id int Default 0 after retailer_id;

//24-10-2024

CREATE TABLE `can_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `can_number` varchar(15) DEFAULT NULL,
  `name_tamil` varchar(50) DEFAULT NULL,
  `name_english` varchar(50) DEFAULT NULL,
  `personalized_name_english` varchar(50) DEFAULT NULL,
  `personalized` varchar(50) DEFAULT NULL,
  `personalized_name_tamil` varchar(50) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `relationship_name_tamil` varchar(50) DEFAULT NULL,
  `relationship_name_english` varchar(50) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `work` varchar(50) DEFAULT NULL,
  `door_no` varchar(20) DEFAULT NULL,
  `village_administrative_area` varchar(20) DEFAULT NULL,
  `community` varchar(20) DEFAULT NULL,
  `caste` varchar(20) DEFAULT NULL,
  `maritial_status` varchar(20) DEFAULT NULL,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `aadhaar_number` varchar(15) DEFAULT NULL,
  `smart_card` varchar(20) DEFAULT NULL,
  `smartcard_number` varchar(15) DEFAULT NULL,
  `street_name_tamil` varchar(50) DEFAULT NULL,
  `postal_name` varchar(50) DEFAULT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `pin_code` varchar(15) DEFAULT NULL,
  `original_dob` varchar(10) DEFAULT NULL,
  `new_mobile_no` varchar(10) DEFAULT NULL,
  `certificate_name` varchar(50) DEFAULT NULL,
  `address_tamil` varchar(200) DEFAULT NULL,
  `address_english` varchar(200) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE `aadhaarcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `pan_card` varchar(20) DEFAULT NULL,
  `smart_card` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `signature` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `name_english` varchar(30) DEFAULT NULL,
  `name_tamil` varchar(30) DEFAULT NULL,
  `address_tamil` varchar(200) DEFAULT NULL,
  `address_english` varchar(200) DEFAULT NULL,
  `address_proof` varchar(200) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB;

alter table aadhaarcard add aadhaar_no varchar(12) after aadhaar_card;

alter table aadhaarcard add retailer_id int Default 0 after user_id;
alter table aadhaarcard add distributor_id int Default 0 after retailer_id;
alter table aadhaarcard add application_no varchar(50) DEFAULT NULL after acknowledgement;
alter table aadhaarcard add proof varchar(20) DEFAULT NULL after address_proof;
alter table aadhaarcard modify acknowledgement varchar(20);

alter table smartcard add commodity_card varchar(20) DEFAULT NULL after application_no;
alter table smartcard add rice_card varchar(20) DEFAULT NULL after commodity_card;
alter table smartcard add sugar_card varchar(20) DEFAULT NULL after rice_card;
alter table smartcard add others varchar(20) DEFAULT NULL after sugar_card;
alter table smartcard add any_proof varchar(40) DEFAULT NULL after sugar_card;
alter table smartcard add new_proof varchar(40) DEFAULT NULL after any_proof;
alter table smartcard add certificate varchar(20) DEFAULT NULL after new_proof;

alter table smartcard add applicant_reciept varchar(20) DEFAULT NULL after certificate;
alter table smartcard add smart_mobile varchar(10) DEFAULT NULL after applicant_reciept;
alter table smartcard add change_cardtype varchar(20) DEFAULT NULL after smart_mobile;
alter table smartcard add smartcard_online varchar(20) DEFAULT NULL after change_cardtype;



Folder Create

bank_passbook
//26-10-24
alter table aadhaarcard add pan_card_no varchar(15) after proof;
alter table aadhaarcard add aadhaar_entrolment_slip varchar(20) after pan_card_no;
alter table aadhaarcard add smart_link_no varchar(15) after aadhaar_entrolment_slip;
alter table aadhaarcard add documents varchar(30) after smart_link_no;

CREATE TABLE `voterid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `voter_id` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `epic_no` varchar(10) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB;

CREATE TABLE `nalavariyam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `mobile` varchar(10) DEFAULT NULL,
  `register_no` varchar(20) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `signature` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `bond` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `service_id` int(11) DEFAULT 0,
 `user_id` int(11) DEFAULT 0,
 `retailer_id` int(11) DEFAULT 0,
 `distributor_id` int(11) DEFAULT 0,
 `admin_id` int(11) DEFAULT 0,
 `amount` decimal(10,2) DEFAULT 0.00,
 `applicant_name` varchar(50) DEFAULT NULL,
 `document_number` varchar(20) DEFAULT NULL,
 `aadhaar_no` varchar(12) DEFAULT NULL,
 `year` varchar(10) DEFAULT NULL,
 `dist_id` int(11) DEFAULT 0,
 `taluk_id` int(11) DEFAULT 0,
 `panchayath_id` int(11) DEFAULT 0,
 `acknowledgement` varchar(20) DEFAULT NULL,
 `application_no` varchar(20) DEFAULT NULL,
 `status` varchar(20) DEFAULT NULL,
 `remarks` varchar(100) DEFAULT NULL,
 `applied_date` varchar(10) DEFAULT NULL,
 `completed_date` varchar(10) DEFAULT NULL,
 `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `fssai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `shop_name` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `pan_card` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB;

  CREATE TABLE `covid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `passport_no` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB;

  alter table fssai add old_food_license varchar(20) after pan_card;

CREATE TABLE `pancard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `pan_card` varchar(20) DEFAULT NULL,
  `smart_card` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `license` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `service_id` int(11) DEFAULT 0,
 `user_id` int(11) DEFAULT 0,
 `retailer_id` int(11) DEFAULT 0,
 `distributor_id` int(11) DEFAULT 0,
 `admin_id` int(11) DEFAULT 0,
 `amount` decimal(10,2) DEFAULT 0.00,
 `reg_cell_number` varchar(10) DEFAULT NULL,
 `aadhaar_card` varchar(20) DEFAULT NULL,
 `dob` varchar(10) DEFAULT NULL,
 `driving_license` varchar(20) DEFAULT NULL,
 `id_proof` varchar(20) DEFAULT NULL,
 `acknowledgement` varchar(20) DEFAULT NULL,
 `status` varchar(20) DEFAULT NULL,
 `remarks` varchar(100) DEFAULT NULL,
 `application_no` varchar(50) DEFAULT NULL,
 `certificate` varchar(20) DEFAULT NULL,
 `applied_date` varchar(10) DEFAULT NULL,
 `completed_date` varchar(10) DEFAULT NULL,
 `created_at` varchar(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
  ) ENGINE=InnoDB;

CREATE TABLE `pancard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `pan_card` varchar(20) DEFAULT NULL,
  `pancard_type` varchar(20) DEFAULT NULL,
  `relative_name` varchar(20) DEFAULT NULL,
  `email_id` varchar(30) DEFAULT NULL,
  `signature` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


alter table tnega_services add tailoring_certificate varchar(20) after smartcard_no;

CREATE TABLE `tailor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(30) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `significant` varchar(20) DEFAULT NULL,
  `father_or_hus_name` varchar(30) DEFAULT NULL,
  `door_no` varchar(20) DEFAULT NULL,
  `street_name` varchar(30) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `pmkissan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(30) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `land_document` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;




alter table aadhaarcard add enrollment_slip varchar(20) after address_proof;
alter table aadhaarcard add correction_proof varchar(20) after enrollment_slip;
alter table aadhaarcard add enrollment_no varchar(20) after correction_proof;
alter table aadhaarcard add enrollment_type varchar(30) after enrollment_no;


alter table can_edit add relationship1 varchar(50) after relationship_name_english;
alter table can_edit add mother_name_tamil varchar(50) after relationship1;
alter table can_edit add mother_name_english varchar(50) after mother_name_tamil;

CREATE TABLE `birth_certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(30) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `childname` varchar(30) DEFAULT NULL,
  `date_of_birth` varchar(10) DEFAULT NULL,
  `place_of_birth` varchar(20) DEFAULT NULL,
  `hospital_name` varchar(50) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


alter table can_edit modify address_tamil varchar(200);

alter table tec_exam add dist_id int(11) DEFAULT NULL after amount;
alter table tec_exam add taluk_id int(11) DEFAULT NULL after dist_id;
alter table tec_exam add panchayath_id int(11) DEFAULT NULL after taluk_id;
alter table tec_exam add name varchar(30) DEFAULT NULL after panchayath_id;
alter table tec_exam add shop_name varchar(50) DEFAULT NULL after mobile;
alter table tec_exam add shop_address varchar(200) DEFAULT NULL after shop_name;
alter table tec_exam add postal_name varchar(30) DEFAULT NULL after shop_address;
alter table tec_exam add village_name varchar(30) DEFAULT NULL after postal_name;
alter table tec_exam add door_no varchar(15) DEFAULT NULL after village_name;
alter table tec_exam add street_name varchar(30) DEFAULT NULL after village_name;
alter table tec_exam add pincode varchar(10) DEFAULT NULL after street_name;
alter table tec_exam add pan_card varchar(20) DEFAULT NULL after pincode;
alter table tec_exam add tec_certificate varchar(20) DEFAULT NULL after pan_card;
alter table tec_exam add bank_passbook varchar(20) DEFAULT NULL after tec_certificate;
alter table tec_exam add voterid varchar(20) DEFAULT NULL after bank_passbook;
alter table tec_exam add bc_agent_certificate varchar(20) DEFAULT NULL after voterid;


alter table tnega_services add family_plannnig_certificate varchar(20) after tailoring_certificate;
alter table tnega_services add birth_certificate_children varchar(20) after family_plannnig_certificate;
alter table tnega_services add id_proof varchar(20) after birth_certificate_children;
alter table tnega_services add family_photo varchar(20) after id_proof;
alter table tnega_services add handicapped_proof varchar(20) after family_photo;
alter table tnega_services add udid_card varchar(20) after handicapped_proof;
alter table tnega_services add registered_deed varchar(20) after udid_card;
alter table tnega_services add chitta_and_villangam varchar(20) after registered_deed;
alter table tnega_services add property_details varchar(20) after chitta_and_villangam;
alter table tnega_services add residential_certificate varchar(20) after property_details;
alter table tnega_services add damage_certificate varchar(20) after residential_certificate;


alter table tec_exam add csc_id_number varchar(20) DEFAULT NULL after bc_agent_certificate;
alter table tec_exam add csc_password varchar(15) DEFAULT NULL after csc_id_number;
alter table tec_exam add e_aadhaar_pdf varchar(15) DEFAULT NULL after csc_password;
alter table tec_exam add e_aadhaar_password varchar(15) DEFAULT NULL after e_aadhaar_pdf;
alter table tec_exam add signature varchar(20) DEFAULT NULL after photo;

alter table tec_exam modify e_aadhaar_pdf varchar(20);

CREATE TABLE `medicalscheme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(30) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `family_head_name` varchar(30) DEFAULT NULL,
  `smartcard_onlineprint` varchar(20) DEFAULT NULL,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `allfamily_mem_aadhaarcard` varchar(20) DEFAULT NULL,
  `family_head_photo` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

ALTER TABLE `license` CHANGE `reg_cell_number` `driving_license_no` VARCHAR(15)  DEFAULT NULL;
alter table license add rc_number varchar(15) DEFAULT NULL after driving_license_no;

CREATE TABLE `voterid_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `wrong_data` varchar(100) DEFAULT NULL,
  `new_data` varchar(100) DEFAULT NULL,
  `correction_documents` varchar(50) DEFAULT NULL,
  `voterid_correction` varchar(20) DEFAULT NULL,
  `doc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

alter table tec_exam add any_proof varchar(100) DEFAULT NULL after signature;

//19-11-24
alter table birth_certificate modify place_of_birth varchar(100);
alter table birth_certificate add date_of_death varchar(10) DEFAULT NULL after date_of_birth;
alter table birth_certificate add place_of_death varchar(100) DEFAULT NULL after date_of_death;

CREATE TABLE `dharsan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` varchar(30) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `darshan_date` varchar(10) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

alter table users add rawallet decimal(10,2) DEFAULT 0 after wallet;
alter table payment add newbalance decimal(10,2) DEFAULT 0 after amount;

alter table services add ser_id int(11) DEFAULT 0 after parent_id;


22-11-2024

alter table family_member add income int(11) DEFAULT 0 after relation_status;
alter table family_member add profession varchar(20) DEFAULT NULL after income;


CREATE TABLE `recharge` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) DEFAULT NULL,
  `circle` varchar(10) DEFAULT NULL,
  `operator` varchar(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT 0,
  `commission_amount` decimal(10,2) DEFAULT 0,
  `recharge_date` date not NULL,
  `recharge_time` varchar(10) DEFAULT NULL,
  user_id int DEFAULT 0,
  plan_id int DEFAULT 0,
  usertx varchar(20) DEFAULT NULL,
  status varchar(20) DEFAULT NULL,
  message varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;


alter table aadhaarcard add certificate varchar(20) DEFAULT NULL after acknowledgement;
alter table voterid modify application_no varchar(40);


CREATE TABLE `callback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `operator` varchar(200) DEFAULT NULL,
  `callback_date` varchar(10) DEFAULT NULL,
  `callback_time` varchar(10) DEFAULT NULL,
  `usertx` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  message varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

alter table payment add newbalance decimal(10,2) DEFAULT 0 after amount;

//26-11-24
alter table dharsan add route varchar(50) DEFAULT NULL after time;

CREATE TABLE `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT 0.00,
  `retailer_commission` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE `smartcard_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT 0,
  `service_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `distributor_amount` decimal(10,2) DEFAULT 0,
  `retailer_amount` decimal(10,2) DEFAULT 0,
  `customer_amount` decimal(10,2) DEFAULT 0,
  `admin_amount` decimal(10,2) DEFAULT 0,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

20-12-2024

CREATE TABLE `find_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT 0,
  `ser_image` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE TABLE `find_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `distributor_amount` decimal(10,2) DEFAULT 0,
  `retailer_amount` decimal(10,2) DEFAULT 0,
  `customer_amount` decimal(10,2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `pancard_find` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `pan_no` varchar(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `father_name` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE TABLE `dl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `dlnumber` varchar(20) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `pdf` longtext DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE TABLE `rc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `rc_no` varchar(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `pdf` longtext DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

alter table pancard_find add amount decimal(10,2) after service_id;

alter table dl add service_id int(11) after user_id;
alter table rc add service_id int(11) after user_id;
alter table ration add service_id int(11) after user_id;

alter table dl add amount decimal(10,2) after service_id;
alter table rc add amount decimal(10,2) after service_id;
alter table ration add amount decimal(10,2) after service_id;

CREATE TABLE `ration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `name` varchar(200) DEFAULT NULL,
  `aadhaar_no` varchar(12) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `pdf` longtext DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

alter table ramji_payment add newbalance decimal(10,2) DEFAULT 0 after amount;

INSERT INTO `find_services` VALUES (1,'Adhaar to Pan Number',12.00,'1.jpg','Active','2024-12-19 09:38:31'),(2,'Pan To Pan Details',11.00,'2.jpg','Active','2024-12-19 09:45:15'),(3,'Driving License PDF',7.00,'3.jpg','Active','2024-12-19 09:48:00'),(4,'RC Pdf',10.00,'4.jpg','Active','2024-12-19 09:49:12'),(5,'Smart Card Pdf',7.00,'5.jpg','Active','2024-12-19 09:51:21');

CREATE TABLE `ramji_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) DEFAULT 0,
  `to_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `iscommission` tinyint(4) DEFAULT 0,
  `customer_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `service_status` varchar(20) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `ad_info` varchar(100) DEFAULT NULL,
  `ad_info2` varchar(100) DEFAULT NULL,
  `paid_image` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `paydate` varchar(50) DEFAULT NULL,
  `log_id` int(11) DEFAULT NULL,
  `k_status` int(11) DEFAULT 1,
  `service_entity` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;



CREATE TABLE `utility_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `ser_image` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE TABLE `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT 0.00,
  `admin_commission` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `operator` VALUES (1,'A','Mobile Prepaid','Airtel',2.00,2.00),(2,'BT','Mobile Prepaid','BSNL TOP UP',5.20,4.00),(3,'RC','Mobile Prepaid','JIO',1.30,1.00),(4,'V','Mobile Prepaid','Vodafone',3.50,3.50),(5,'ATV','DTH','Airtel Digital TV',4.20,3.50),(6,'DTV','DTH','Dish TV',4.40,3.40),(7,'STV','DTH','Sun Direct',3.25,3.00),(8,'TTV','DTH','Tata Sky',3.20,2.80),(9,'VTV','DTH','Videocon DTH',4.20,3.50),(10,'BR','Mobile Prepaid','BSNL STV',5.20,4.00),(11,'I','Mobile Prepaid','IDEA',3.50,3.50),(12,'FDF','Fastag','Federal Bank - Fastag',0.10,0.00),(13,'HDF','Fastag','Hdfc Bank - Fastag',0.10,0.00),(14,'ICF','Fastag','Icici Bank Fastag',0.10,0.00),(15,'IBF','Fastag','Idbi Bank Fastag',0.10,0.00),(16,'IFF','Fastag','Idfc First Bank- Fastag',0.10,0.00),(17,'PTF',NULL,'Paytm Payments Bank Fastag',0.10,0.10),(18,'AXF',NULL,'Axis Bank Fastag',0.10,0.10);

CREATE TABLE `recharge` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) DEFAULT NULL,
  `circle` varchar(10) DEFAULT NULL,
  `operator` varchar(10) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT 0,
  `commission_amount` decimal(10,2) DEFAULT 0,
  `recharge_date` date not NULL,
  `recharge_time` varchar(10) DEFAULT NULL,
  user_id int DEFAULT 0,
  plan_id int DEFAULT 0,
  usertx varchar(20) DEFAULT NULL,
  status varchar(20) DEFAULT NULL,
  message varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE TABLE `callback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `operator` varchar(200) DEFAULT NULL,
  `callback_date` varchar(10) DEFAULT NULL,
  `callback_time` varchar(10) DEFAULT NULL,
  `usertx` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  message varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;


CREATE TABLE `user_permission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT 0,
  `parent_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

03-01-2025

alter table pancard add api_status varchar(30) DEFAULT Null after status;
alter table pancard add api_url varchar(700) DEFAULT Null after api_status;
alter table pancard add api_txid varchar(30) DEFAULT Null after api_url;

INSERT INTO `find_services` VALUES (1,'Adhaar to Pan Number',12.00,'1.jpg','Active','2024-12-19 09:38:31'),(2,'Pan To Pan Details',11.00,'2.jpg','Active','2024-12-19 09:45:15'),(3,'Driving License PDF',7.00,'3.jpg','Active','2024-12-19 09:48:00'),(4,'RC Pdf',10.00,'4.jpg','Active','2024-12-19 09:49:12'),(5,'Smart Card Pdf',7.00,'5.jpg','Active','2024-12-19 09:51:21'),(6,'Cell Number Link In Voter ID',25.00,'6.jpg','Active','2024-12-20 19:12:02'),(7,'Voter ID Pdf',25.00,'7.jpg','Active','2024-12-20 19:14:05');



/9-01-2025

CREATE TABLE `voter_find` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT 0,
  `service_id` int DEFAULT 0,
  `epic_no` varchar(20) DEFAULT NULL,
  `scode` varchar(20) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `pdf` longtext DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `new_mobile` varchar(10) DEFAULT NULL,
  `state_name` varchar(50) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

//17-01-25

alter table can_edit add relationship_1 varchar(50) DEFAULT NULL after relationship;
alter table can_edit add relationship_2 varchar(50) DEFAULT NULL after relationship_1;
alter table can_edit add relationship_3 varchar(50) DEFAULT NULL after relationship_2;
alter table can_edit add relationship_name_english_1 varchar(100) DEFAULT NULL after personalized;
alter table can_edit add relationship_name_english_2 varchar(100) DEFAULT NULL after relationship_name_english_1;
alter table can_edit add relationship_name_english_3 varchar(100) DEFAULT NULL after relationship_name_english_2;
alter table can_edit add relationship_name_tamil_1 varchar(100) DEFAULT NULL after relationship_name_english_3;
alter table can_edit add relationship_name_tamil_2 varchar(100) DEFAULT NULL after relationship_name_tamil_1;
alter table can_edit add relationship_name_tamil_3 varchar(100) DEFAULT NULL after relationship_name_tamil_2;

//19-01-25-vani
alter table services add sub_service_image varchar(30) after service_image;
alter table services add software varchar(50) after sub_service_image;

CREATE TABLE `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `device_name` varchar(200) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `application_no` varchar(50) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


alter table users add panchayath_name varchar(50) after panchayath_id;

//28-01-2025

CREATE TABLE `tnega_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `retailer_id` int(11) DEFAULT 0,
  `distributor_id` int(11) DEFAULT 0,
  `admin_id` int(11) DEFAULT 0,
  `amount` decimal(10,2) DEFAULT 0.00,
  `name` text DEFAULT '0',
  `aadhaar_no` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `dist_id` int(11) DEFAULT 0,
  `taluk_id` int(11) DEFAULT 0,
  `panchayath_id` int(11) DEFAULT 0,
  `aadhaar_card` varchar(20) DEFAULT NULL,
  `aadhaar_back` varchar(20) DEFAULT NULL,
  `smart_card` varchar(20) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `old_can_document` varchar(20) DEFAULT NULL,
  `can_number` text DEFAULT NULL,
  `can_details` varchar(20) DEFAULT NULL,
  `job_type` varchar(20) DEFAULT NULL,
  `salary_slip` varchar(20) DEFAULT NULL,
  `pancard` varchar(20) DEFAULT NULL,
  `income_yearly` text DEFAULT NULL,
  `income_monthly` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `tc_community_certificate` varchar(20) DEFAULT NULL,
  `income_certificate` varchar(20) DEFAULT NULL,
  `community_certificate` varchar(20) DEFAULT NULL,
  `birth_certificate` varchar(20) DEFAULT NULL,
  `smartcard_online` varchar(20) DEFAULT NULL,
  `age_proof` varchar(30) DEFAULT NULL,
  `voterid` varchar(20) DEFAULT NULL,
  `driving_license` varchar(20) DEFAULT NULL,
  `marksheet` varchar(20) DEFAULT NULL,
  `mrg_invitation` varchar(20) DEFAULT NULL,
  `deed` varchar(20) DEFAULT NULL,
  `bank_pass_book` varchar(20) DEFAULT NULL,
  `personal_strap` varchar(20) DEFAULT NULL,
  `joint_strap` varchar(20) DEFAULT NULL,
  `deed_details` varchar(20) DEFAULT NULL,
  `deed_yes` varchar(20) DEFAULT NULL,
  `hus_wife_photo` varchar(20) DEFAULT NULL,
  `permanent_social_certificate_groom` varchar(20) DEFAULT NULL,
  `bride_permanent_social_certificate` varchar(20) DEFAULT NULL,
  `mrg_registration_certificate` varchar(20) DEFAULT NULL,
  `anyothers_certificate` varchar(20) DEFAULT NULL,
  `chitta` varchar(20) DEFAULT NULL,
  `aggregation` varchar(20) DEFAULT NULL,
  `ec_certificate` varchar(20) DEFAULT NULL,
  `villankam` varchar(20) DEFAULT NULL,
  `vao_certificate` varchar(20) DEFAULT NULL,
  `self_declaration_certificate` varchar(20) DEFAULT NULL,
  `other_certificate` varchar(20) DEFAULT NULL,
  `passport` text DEFAULT NULL,
  `placement_registration` varchar(20) DEFAULT NULL,
  `school_transfer_certificate` varchar(20) DEFAULT NULL,
  `study_proof` text DEFAULT NULL,
  `family_income_certificate` varchar(20) DEFAULT NULL,
  `husband_death_certificate` varchar(20) DEFAULT NULL,
  `legal_heir_certificate` varchar(20) DEFAULT NULL,
  `widow_certificate` varchar(20) DEFAULT NULL,
  `mrg_documents` varchar(20) DEFAULT NULL,
  `mrg_docdetails` text DEFAULT NULL,
  `any_proof` text DEFAULT NULL,
  `smartcard_no` varchar(15) DEFAULT NULL,
  `tailoring_certificate` varchar(20) DEFAULT NULL,
  `family_plannnig_certificate` varchar(20) DEFAULT NULL,
  `birth_certificate_children` varchar(20) DEFAULT NULL,
  `id_proof` varchar(20) DEFAULT NULL,
  `family_photo` text DEFAULT NULL,
  `handicapped_proof` varchar(20) DEFAULT NULL,
  `udid_card` varchar(20) DEFAULT NULL,
  `registered_deed` text DEFAULT NULL,
  `chitta_and_villangam` varchar(20) DEFAULT NULL,
  `property_details` varchar(20) DEFAULT NULL,
  `residential_certificate` varchar(20) DEFAULT NULL,
  `damage_certificate` varchar(20) DEFAULT NULL,
  `acknowledgement` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `application_no` text DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `applied_date` varchar(10) DEFAULT NULL,
  `completed_date` varchar(10) DEFAULT NULL,
  `created_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


alter table tnega_services add personalized text DEFAULT NULL after can_details;
alter table tnega_services add relationship_1 varchar(50) DEFAULT NULL after personalized;
alter table tnega_services add relationship_2 varchar(50) DEFAULT NULL after relationship_1;
alter table tnega_services add relationship_3 varchar(50) DEFAULT NULL after relationship_2;
alter table tnega_services add dob varchar(10) DEFAULT NULL after relationship_3;
alter table tnega_services add religion varchar(50) DEFAULT NULL after dob;
alter table tnega_services add education text DEFAULT NULL after religion;
alter table tnega_services add work text DEFAULT NULL after education;
alter table tnega_services add door_no varchar(20) DEFAULT NULL after work;
alter table tnega_services add personalized_name_tamil text DEFAULT NULL after door_no;
alter table tnega_services add relationship_name_tamil_1 text DEFAULT NULL after personalized_name_tamil;
alter table tnega_services add relationship_name_tamil_2 text DEFAULT NULL after relationship_name_tamil_1;
alter table tnega_services add relationship_name_tamil_3 text DEFAULT NULL after relationship_name_tamil_2;
alter table tnega_services add community text DEFAULT NULL after relationship_name_tamil_3;
alter table tnega_services add smartcard_number varchar(20) DEFAULT NULL after community;
alter table tnega_services add street_name_tamil text DEFAULT NULL after smartcard_number;
alter table tnega_services add postal_name text DEFAULT NULL after street_name_tamil;
alter table tnega_services add personalized_name_english text DEFAULT NULL after postal_name;
alter table tnega_services add relationship_name_english_1 text DEFAULT NULL after personalized_name_english;
alter table tnega_services add relationship_name_english_2 text DEFAULT NULL after relationship_name_english_1;
alter table tnega_services add relationship_name_english_3 text DEFAULT NULL after relationship_name_english_2;
alter table tnega_services add maritial_status varchar(20) DEFAULT NULL after relationship_name_english_3;
alter table tnega_services add caste text DEFAULT NULL after maritial_status;
alter table tnega_services add street_name text DEFAULT NULL after caste;
alter table tnega_services add pin_code text DEFAULT NULL after street_name;
alter table tnega_services add village_administrative_area text DEFAULT NULL after pin_code;


//31-01-2025
alter table tec_exam add new_proof varchar(20) DEFAULT NULL after any_proof;
alter table tec_exam add any_document varchar(100) DEFAULT NULL after application_no;

alter table tec_exam add selects varchar(20) DEFAULT NULL after application_no;
alter table aadhaarcard add selects varchar(20) DEFAULT NULL after application_no;
alter table birth_certificate add selects varchar(20) DEFAULT NULL after application_no;
alter table bond add selects varchar(20) DEFAULT NULL after application_no;
alter table can_edit add selects varchar(20) DEFAULT NULL after application_no;
alter table covid add selects varchar(20) DEFAULT NULL after application_no;
alter table dharsan add selects varchar(20) DEFAULT NULL after application_no;
alter table fssai add selects varchar(20) DEFAULT NULL after application_no;
alter table gst add selects varchar(20) DEFAULT NULL after application_no;
alter table itr add selects varchar(20) DEFAULT NULL after application_no;
alter table license add selects varchar(20) DEFAULT NULL after application_no;
alter table msme add selects varchar(20) DEFAULT NULL after application_no;
alter table nalavariyam add selects varchar(20) DEFAULT NULL after application_no;
alter table pancard add selects varchar(20) DEFAULT NULL after application_no;
alter table pmkissan add selects varchar(20) DEFAULT NULL after application_no;
alter table smartcard add selects varchar(20) DEFAULT NULL after application_no;
alter table software add selects varchar(20) DEFAULT NULL after application_no;
alter table tailor add selects varchar(20) DEFAULT NULL after application_no;
alter table voterid add selects varchar(20) DEFAULT NULL after application_no;
