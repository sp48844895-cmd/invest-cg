@extends('layouts.app')

@section('content')
<!-- Hero Banner -->
<section class="sector-hero">
  <img src="assets/img/sectors/criminal-provision.jpg" class="hero-video" alt="Department of Commerce and Industries">
  <div class="hero-gradient-overlay"></div>
  <div class="container">
    <div class="hero-content-wrapper">
      <div class="hero-text">
        <h1 class="hero-title">Criminal Provision</h1>
      </div>
    </div>
  </div>
</section>

<!-- Breadcrumb/Tabs Navigation -->
<div class="breadcrumb-nav">
  <div class="container breadcrumb-wrapper">
    <button class="breadcrumb-nav-btn breadcrumb-nav-prev" id="breadcrumbPrev" aria-label="Previous">
      <i class="fa-solid fa-chevron-left"></i>
    </button>
    <div class="breadcrumb-container" id="breadcrumbContainer">
      <a href="{{ route('pages.show', 'dept-of-c-i') }}" class="tab-breadcrumb">Dept of C&I</a>
      <span class="breadcrumb-separator">›</span>
      <a href="#" class="tab-breadcrumb active">Criminal Provision</a>
    </div>
    <button class="breadcrumb-nav-btn breadcrumb-nav-next" id="breadcrumbNext" aria-label="Next">
      <i class="fa-solid fa-chevron-right"></i>
    </button>
  </div>
</div>

<section class="cp-content-section">
  <div class="container">
    <!-- Stats Bar -->
    <div class="cp-stats">
      <div class="cp-stat-item">
        <span class="cp-stat-number" id="totalCount">52</span>
        <span class="cp-stat-label">Total Provisions</span>
      </div>
      <div class="cp-stat-item">
        <span class="cp-stat-number" id="filteredCount">52</span>
        <span class="cp-stat-label">Showing</span>
      </div>
      <div class="cp-stat-item cp-search-item">
        <div class="cp-search-group">
          <input type="text" id="searchInput" class="cp-search-input" placeholder="Search by service, act, or description...">
          <i class="fa-solid fa-search"></i>
        </div>
      </div>
      <div class="cp-stat-item">
        <button class="cp-expand-all" id="expandAll">Expand All</button>
      </div>
    </div>

    <!-- Department Categories -->
    <div class="cp-departments" id="departmentsContainer">
      @php
      $provisions = [
        ['sno' => 1, 'dept' => 'CSIDC', 'service' => 'Land Allotment', 'act' => 'Chhattisgarh Industrial Land and Building Management Rules, 2015', 'section' => 'Rule 3.7', 'description' => 'Non-payment of charges as provided in lease deed', 'punishment' => 'Penalty is imposed 18 for first year and 24 from second year onwards and forfeit the amount of security deposit', 'trigger' => 'Unit fails to pay lease rent in prescribed time limit.'],
        ['sno' => 2, 'dept' => 'CSIDC', 'service' => 'Water Connection', 'act' => 'Industrial Water Supply System Rules 2011', 'section' => 'Rule 19', 'description' => 'Provision for delay payment of water supply connection', 'punishment' => 'If the unit fails to pay the requisite amount of water supply during the month 20 penalty is imposed from next month onwards', 'trigger' => 'Delay or non-payment of water supply charges'],
        ['sno' => 3, 'dept' => 'TCP', 'service' => 'Occupancy Certificate', 'act' => 'Chhattisgarh Land Development Rules 1984', 'section' => 'Clause 98', 'description' => 'On completion of the building and before its occupation, the owner of building shall give notice to the authority in the format prescribed in Appendix- G. The Authority/External agency shall carry out Single Joint inspection provided under Rule 34 within 7 days of receipt of such notice and submit the inspection reports in the format given in Appendix- Q3 within 48 hours of the Single Joint Inspection The Authority shall issue Completion and Occupancy Certificate in format given in Appendix-T within eight days from the receipt of such notice failing which it shall be deemed to have been issued. Occupancy of a building for which a completion and occupancy certificate has not been obtained shall be deemed to be a violation under Section 36 of Chhattisgarh Nagar Tatha Gram Nivesh Adhiniyam, 1973 ( No 26 of 1973) and shall invite the penalty prescribed therein.', 'punishment' => '6 months or 10,000 Rs or both', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 4, 'dept' => 'TCP', 'service' => 'Occupancy Certificate', 'act' => 'Chhattisgarh Nagar Tatha Gram Nivesh Adhiniyam, 1973', 'section' => 'Section 36', 'description' => 'Any person who whether at his own instance or at the instance of any other person, commences, undertake or carries out any development or changes use of any land- a) Without permission required under this act. b) In contravention of the permission granted or any condition subject to which such permission has been granted c) in contravention of any permission which has been duly modified Shall without prejudice to any action that may be taken under Section 37, be punished with simple imprisonment for a term which my extend to six months or with fine of minimum ten thousand rupees or with both, and in the case of a continuing offence with further fine which may extend to one thousand rupees for every day during which the offence continues after conviction for the first offence, and such property of unauthorized development may be forfeited.)', 'punishment' => '6 months or 10000 Rs or both', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 5, 'dept' => 'TCP', 'service' => 'Plinth Certificate', 'act' => 'Chhattisgarh Land Development Rules, 1984', 'section' => 'Clause 96', 'description' => 'On completion of the construction of the plinth. The owner of the building shall give notice to the authority in the format prescribed in Appendix-F. The authority/External Agency within 7 days of receipt of such notice shall carry out Single Joint Inspection provided under Rule 34 and submit the inspection reports in the format given in Appendix 22 within 48 hours of the Single Joint Inspection. The Authority shall issue Plinth Certificate prescribing conditions/instructions to be followed by owner in format given in Appendix 5 within 8 days from the receipt of such notice failing which it will be deemed to have been issued. The owner shall carry out such instructions as are given. failing which the authority will be competent to demolish such part of the plinth as is under objections.', 'punishment' => 'Demolition of building', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 6, 'dept' => 'TCP', 'service' => 'Building Permission', 'act' => 'Chhattisgarh Nagar Tatha Gram Nivesh Adhiniyam, 1973', 'section' => 'Section 36', 'description' => 'Any person who, whether at his own instance or at the instance of any other person, commences, undertake, or carries out any development or changes use of any land-(a) Without permission required under this Act(b) in contravention of the permission granted or any condition subject to which such permission has been granted(c) in contravention of any permission which has been duly modifiedShall without prejudice to any action that may be taken under Section 37, be punished with simple imprisonment for a term which my extend to six months or with fine of minimum ten thousand rupees or with both, and in the case of a continuing offence with further fine which may extend to one thousand rupees for every day during which the offence continues after conviction for the first offence, and such property of unauthorized development may be forfeited.If within the period specified in the notice or within the same period after the disposal of the application the notice or so much of it as stands is not complied with, the Director may-(a) Prosecute the owner for not complying with the notice and whether the notice requires the discontinuance of any use of land, any other person also who uses the land or cause or permits the land to be used in contravention of the notice', 'punishment' => '6 months or 10000 rupees or both', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 7, 'dept' => 'TCP', 'service' => 'Building Permission', 'act' => 'Chhattisgarh Nagar Tatha Gram Nivesh Adhiniyam 1973', 'section' => 'Section 37(6)', 'description' => 'b) Where the notice required the demolition or any alteration of any building or works or carrying out of any building or other operation itself cause the restorations of the land to its condition before the development took place and secure compliance with the condition of the permission or with the permission as modified by taking such steps as the Director may consider necessary, including demolition or alteration of any building or works or carrying out of any building or other operations, and recover the amount of any expenses incurred by him in this behalf from the owner as arrears of land revenue. (7) Any person prosecuted under clause (a) or sub-section (6) shall, on conviction, be punished with simple imprisonment for a term which may extend to six months or with fine of minimum ten thousand rupees or with both, and in the case of a continuing offence with further fine which may extend to one thousand rupees for every day during which the offence continues after conviction for the first offence', 'punishment' => '6 months or 10000 rupees or both', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 8, 'dept' => 'Food and Drug', 'service' => 'Retail/Wholesale Manufacturing', 'act' => 'Drugs and Cosmetics Act 1940 and Rule 1945', 'section' => 'Section 27', 'description' => 'a) For adulterated or spurious drugs causing grievous hurt. (b) For adulterated drugs, without license as required under 18 c (c)For spurious drugs (d)Any other contravention other than as referred in 27(a), 27(b), 27 (c)', 'punishment' => '27a) Punishment not less than 10 years up to life Imprisonment. Penalty Not less than 10 lakhs 27 b) Punishment not less than 3 years may extend up to 5-year Penalty- Not less than one lakh 27 c) Punishment not less than 3 years up to 7 years penalty less than one lakh 27 d) Punishment not less than 1-year up to 2 year and Penalty not less than Rs 20000', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 9, 'dept' => 'Firms and Societies', 'service' => 'Registration of Partnership Firms', 'act' => 'Indian Partnership Act 1932', 'section' => 'Section 70', 'description' => 'Penalty for furnishing false particulars - Any person who signs any statement, amending statement, notice or intimation under thisChapter containing any which knows to be false or does not believe to be true, or containing particulars which he knows to be incomplete or does not believe to be complete,shall be punishable with imprisonment which may extend to three months, or with fine, or with both', 'punishment' => 'Shall be punishable with imprisonment which may extend to one year, or with fine not more than Rs. 1000/-, or with both.', 'trigger' => 'On furnishing false particulars'],
        ['sno' => 10, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnisagan eva apatkalin seva adhiniyam 2018', 'section' => 'Section 19(2)', 'description' => 'Failure by the owner of residences/buildings/premises to appoint a fire safety officer', 'punishment' => 'Rs. 10/- per square meter depending on the area/occupancy area. Fine up to Rs.50/- per square meter as may be determined by the Director General.', 'trigger' => 'Failure to appoint owner fire safety officer by residences/buildings/premises.'],
        ['sno' => 11, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnishagan evam aapatkalin seva adhiniyam, 2018', 'section' => 'Section 35', 'description' => 'Violation of the provisions made under Section 33 for fire prevention and fire safety in buildings and premises.', 'punishment' => 'Imprisonment for a term up to 06 months or fine of Rs. Fine up to Rs 50,000/- or both. If the offense continues, a fine of Rs. 1000 for every day after the first offence. Fine up to Rs 1000/-.', 'trigger' => 'Violation of the provisions made under Section 33 for fire prevention and fire safety in buildings and premises'],
        ['sno' => 12, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnishagan evam aapatkalin seva adhiniyam, 2018', 'section' => 'Section 41 (5)', 'description' => 'Unauthorized breaking of the seal of buildings or premises sealed by the Director General', 'punishment' => 'Imprisonment for a term up to 03 months or fine of Rs. Fine up to Rs 25,000/- or both.', 'trigger' => 'Unauthorized breaking of the seal of buildings or premises sealed by the Director General.'],
        ['sno' => 13, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnishagan evam aapatkalin seva adhiniyam, 2018', 'section' => 'Section 47', 'description' => 'Failure to comply with the conditions specified in the notification issued under Section 14(2).', 'punishment' => 'Imprisonment up to 03 months or Rs. Fine up to Rs.1000/- or Rs.1000/- for every day after the first offense if the offense continues. Fine up to Rs 500/-', 'trigger' => 'Failure to comply with the conditions specified in the notification issued under Section 14(2).'],
        ['sno' => 14, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnishagan evam aapatkalin seva adhiniyam, 2018', 'section' => 'Section 48', 'description' => 'Wilfully causing obstruction or interference with any member of the fire and emergency services who is engaged in fire rescue operations.', 'punishment' => 'Imprisonment up to 03 months or Rs. Fine up to Rs 5000/- or both.', 'trigger' => 'Any member of the fire and emergency services who is engaged in fire rescue operations. intentionally interfere with Or creating obstruction.'],
        ['sno' => 15, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnishagan evam aapatkalin seva adhiniyam, 2018', 'section' => 'Section 49', 'description' => 'Giving false information or information about a fire.', 'punishment' => 'Imprisonment up to 03 months or fine up to Rs 1000/- or both', 'trigger' => 'Giving false alarm or information about fire. any provision of this Act'],
        ['sno' => 16, 'dept' => 'Home (Fire)', 'service' => 'Fire Services', 'act' => 'Chhattisgarh Agnishagan evam aapatkalin seva adhiniyam, 2018', 'section' => 'Section 50', 'description' => 'Violating any provision of this Act or any rule or notification made thereunder.', 'punishment' => 'Imprisonment up to 3 months or fine up to Rs 10,000/- or both. If the offense is continued then after the first offense Rs. Fine up to Rs 500/-', 'trigger' => 'violating any rule or notification made thereunder'],
        ['sno' => 17, 'dept' => 'Boiler', 'service' => 'Registration & Renewal of Boiler', 'act' => 'Boiler Act 1923', 'section' => 'Section 22', 'description' => 'Minor penalties Any owner of a boiler who refuses or without reasonable excuse neglects- (i) to surrender a provisional order as required by section 9 or (ii) to produce a certificate or provisional order when duly called upon to do so under section 15 or (iii) to make over to the new owner of a boiler a certificate or provisional order as required by section 16 or (iv)to report an accident to a boiler or boiler component when so required under section 18', 'punishment' => 'Penalty up to Rs.5,000', 'trigger' => 'On refusing or neglecting: 1. to surrender a provisional order u/s 9 2. to produce a certificate or provisional order u/s 15 3. to make over to the new owner of a boiler a certificate or provisional order as required by section 16 4. to report an accident to a boiler or boiler component when so required under section 18'],
        ['sno' => 18, 'dept' => 'Boiler', 'service' => 'Registration & Renewal of Boiler', 'act' => 'Boiler Act 1923', 'section' => 'Section 23', 'description' => 'Penalties for illegal use of boiler: Any owner of boiler who, (a) in any case in which a certificate or provisional order is required for the use of the boiler under this Act, uses the boiler either without any such certificate or order being in force or at a higher pressure than that allowed thereby, (b) uses or permits to be used a boiler which has been transferred from one State to another without such transfer having been reported as required under clause (b) of section 6 or (c) fails to cause the register number allotted to the boiler under this Act to be permanently marked on the boiler as required under sub-section (6) of section 7', 'punishment' => 'Penalty up to Rs 1,00,000 and 1,000/ day for each day of contravention', 'trigger' => 'Upon illegal use of boiler'],
        ['sno' => 19, 'dept' => 'Boiler', 'service' => 'Registration & Renewal of Boiler', 'act' => 'Boiler Act 1923', 'section' => 'Section 24', 'description' => 'Other penalties: Any person who- (c) makes any structural alteration, addition or renewal in or to a boiler without first obtaining the sanction of the Chief Inspector when so required by section 12, or to a steampipe without first informing the Chief Inspector when so required by section 13, or (e) tampers with a safety valve of a boiler so as to render it inoperative at the maximum pressure at which the use of the boiler is authorized under this Act, or (f) allows another person to go inside a boiler without effectively disconnecting the same in the prescribed manner from any steam or hot water connection with any other boiler or from fuel mains', 'punishment' => 'Imprisonment up to 2 yrs. or fine Up to Rs. 1,00,000 or with both', 'trigger' => 'In case of other violation listed under sec 24(c), (e) & (f)'],
        ['sno' => 20, 'dept' => 'Boiler', 'service' => 'Registration & Renewal of Boiler', 'act' => 'Boiler Act 1923', 'section' => 'Section 25', 'description' => 'Penalty for tampering with register mark: (1)Whoever removes, alters, defaces, renders invisible or otherwise tampers with the register number marked on a boiler in accordance with the provisions of this Act or any Act repealed hereby, (2)Whoever fraudulently marks upon a boiler a register number which has not been allotted to it under this Act or any Act repealed hereby', 'punishment' => 'Penalty up to Rs 1,00,000 Imprisonment up to 2 years or fine up to Rs 1,00,000 or with both', 'trigger' => 'Upon fraudulently marking upon a boiler a registered number not allotted to it'],
        ['sno' => 21, 'dept' => 'Boiler', 'service' => 'Registration & Renewal of Boiler', 'act' => 'Boiler Act 1923', 'section' => 'Section 30', 'description' => 'Any regulation or rule made under section 28 or section 29 may direct that a person contravening such regulation or rule shall be liable', 'punishment' => 'Penalty up to Rs 1,000 in the case of any subsequent offence, fine up to Rs 1,00,000', 'trigger' => 'Upon Contravening regulation made u/s 28 or 29'],
        ['sno' => 22, 'dept' => 'Boiler', 'service' => 'Registration and renewal of license under the Factories Act. 1948', 'act' => 'Factories Act. 1948', 'section' => 'Sec. 6 and Rule 4. 5. 6', 'description' => 'To apply for Registration and Licence along with prescribed fee at least fifteen days before the premises are occupied and used as a factory.', 'punishment' => '2 year or fine up to Rs. 1 lakh or both. Continuation of Contravention Rs. 1 ,000/- per daytill continuation', 'trigger' => '2 year or fine upto Rs. 1.00 lack or both. Continuation of Contravention Rs. 1,000/- per day till continuation'],
        ['sno' => 23, 'dept' => 'Labour', 'service' => 'Approval of plan and permission to constructextend of take into use any building as a factory under the factoryAct 1948', 'act' => 'Factories Act. 1948', 'section' => 'Section 30', 'description' => 'Any building shall be extended as part of a factory only after the outline in Form 1(a) has been approved by the Chief Factory Inspector', 'punishment' => '2 year or fine up to Rs. 1.00 lack or both. Continuation of Contravention Rs. 1,000/- per daytill continuation', 'trigger' => '2 year or fine up to Rs. 1.00 lack or both. Continuation ofContravention Rs. 1 .000/- per day till continuation.'],
        ['sno' => 24, 'dept' => 'Labour', 'service' => 'License/Renewal for contractors under provision of the contracts labour (regulation and abolition) Act. 1970', 'act' => 'contracts labour (regulation and abolition) Act. 1970', 'section' => 'Sec. 7', 'description' => 'Licence under the Act by the contractor or establishment where the Act applies.', 'punishment' => '3 month or fine up to Rs. 1,000/- or both. Continuation of Contravention Rs. 100/- per day till continuation', 'trigger' => '3 month or fine up to Rs. 1,000/- or both. Continuation of Contravention Rs. 1 00/- per day till continuation'],
        ['sno' => 25, 'dept' => 'Labour', 'service' => 'Registration/Renewal of principal employers establishment under provision of the contracts labour (regulation and abolition) Act. 1970', 'act' => 'contracts labour (regulation and abolition) Act, 1970', 'section' => 'Sec', 'description' => 'Registration tinder the Act by the principal employer of any establishment or factory where the Act applies', 'punishment' => '3 month or fine up to Rs. 1,000/- or both. Continuation of Contravention Rs. 100/- per day till continuation.', 'trigger' => '3 month or fine up to Rs. 1 ,000/- or both. Continuation of Contravention Rs. 1 00/- per day till continuation.'],
        ['sno' => 26, 'dept' => 'Labour', 'service' => 'Registration/Renewal under The Building and other construction Workers (Regulation of Employment and Condition of Service) Act, 1996', 'act' => 'The building and other construction Workers (Regulation of Employment and Condition of Service) Act, 1996', 'section' => 'Sec. 7 and Rule 24', 'description' => 'Registration under the Act must be done by the principal employer within 60 days of commencement of work.', 'punishment' => '3 month or fine up to Rs. 2,000/- or both. Continuation of Contravention Rs. 100/- per daytill continuation', 'trigger' => '3 month or fine up to Rs. 2,000/- or both. Continuation of Contravention Rs. 100/- per day till continuation.'],
        ['sno' => 27, 'dept' => 'Labour', 'service' => 'Registration/Renewal of establishment under the Inter State migrant Workmen (RE&CS) Act, 1979', 'act' => 'Inter State migrant Workmen (RE&CS) Act,1979', 'section' => 'Sec. 4', 'description' => 'Registration under the Act by the principal employer of any establishment or factory where the Act applies', 'punishment' => '1 year or fine up to Rs. 1.000/- or both. Continuation of Contravention 2 year or fine up to Rs. 2.000/- or both.', 'trigger' => '1 year or fine up to Rs. 1,000/- or both. Continuation of Contravention 2 year or fine up to Rs. 2.000/- or both'],
        ['sno' => 28, 'dept' => 'Labour', 'service' => 'Registration/Renewal of establishment under the Shops and Establishments Act, 1958', 'act' => 'Shops and Establishments Act,1958', 'section' => 'Sec. 6', 'description' => 'Every establishment to which this Act applies shall be registered in accordance with the provision of this section', 'punishment' => '1 year or fine up to Rs. 1,000/- or Both Continuation of Contravention fine up to Rs. 1,500/', 'trigger' => '1 year or fine up to Rs. 1,000/- or Continuation of Contravention fine up to Rs. 1,500/.'],
        ['sno' => 29, 'dept' => 'CSPDCL', 'service' => 'Power Supply', 'act' => 'Indian Electricity 2003', 'section' => '135 (Theft of Electricity)', 'description' => 'a) taps, makes or causes to be made any connection with overhead, underground or under water lines or cables, or service wires, or service facilities of a licensee or supplier or (b) tampers a meter, installs or uses a tampered meter, current reversing transformer, loop connection or any other device or method which interferes with accurate or proper registration, calibration or metering of electric current or otherwise results in a manner whereby electricity is stolen or wasted or (c) damages or destroys an electric meter, apparatus, equipment, or wire or causes or allows any of them to be so damaged or destroyed as to interfere with the proper or accurate metering of electricity, (d) uses electricity through a tampered meter or (e) uses electricity for the purpose other than for which the usage of electricity was authorised, to abstract or consume or use electricity shall be punishable with imprisonment for a term which may extend to three years or with fine or with both', 'punishment' => 'Imprisonment & Penalty both: punishable with imprisonment for a term which may extend to three years or with fine or with both (Note : Amount of penalty depends on load and category of connection w.r.t. penalty is in case of theft is 2.5 times and malpractice of electricity is 2.0 times of rate as per applicable tariff respectively.)', 'trigger' => 'Direct Theft of Electricity'],
        ['sno' => 30, 'dept' => 'CSPDCL', 'service' => 'Power Supply', 'act' => 'Indian Electricity 2003', 'section' => '135 (Theft of Electricity)', 'description' => 'a) taps, makes or causes to be made any connection with overhead, underground or under water lines or cables, or service wires, or service facilities of a licensee or supplier or (b) tampers a meter, installs or uses a tampered meter, current reversing transformer, loop connection or any other device or method which interferes with accurate or proper registration, calibration or metering of electric current or otherwise results in a manner whereby electricity is stolen or wasted or (c) damages or destroys an electric meter, apparatus, equipment, or wire or causes or allows any of them to be so damaged or destroyed as to interfere with the proper or accurate metering of electricity, (d) uses electricity through a tampered meter or (e) uses electricity for the purpose other than for which the usage of electricity was authorised, to abstract or consume or use electricity shall be punishable with imprisonment for a term which may extend to three years or with fine or with both.', 'punishment' => 'Imprisonment & Penalty both: punishable with imprisonment for a term which may extend to three years or with fine or with both (Note : Amount of penalty depends on load and category of connection w.r.t. penalty is in case of theft is 2.5 times and malpractice of electricity is 2.0 times of rate as per applicable tariff respectively.)', 'trigger' => 'Direct Theft of Electricity'],
        ['sno' => 31, 'dept' => 'the', 'service' => 'Obtaining Drawing Approval from Electrical Inspectorate', 'act' => 'Electricity Act-2003/ CEA Rule 2023', 'section' => '146 - Penalty for non-compliance of orders or instructions 146 - Penalty for non-compliance of orders or instructions', 'description' => 'Whoever fails to comply with any order or direction given under this Act within such time as may be specified in the said order or direction or any of the provisions of this Act or any rules or regulations made thereunder violates or attempts to violate or abets, it shall be punishable in respect of each offense with imprisonment for a term which may extend to three months, or with fine which may extend to one lakh rupees, or with both, and for continued failure shall be punishable with an additional fine which may extend to five thousand rupees for each day during which such failure continues after the first conviction of such offense (Provided that nothing contained in this section shall be subject to the provisions of section 121) (shall not apply to the orders, instructions or directives issued under)', 'punishment' => 'Imprisonment up to 3 months or penalty up to 1,00,000 rupees', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 32, 'dept' => 'the', 'service' => 'Approval for DG set Installation (Registration and Renewal) from all concerned authorities (as applicable)', 'act' => 'Electricity Act-2003/ CEA Rule 2023', 'section' => '146 - Penalty for non-compliance of orders or instructions 146 - Penalty for non-compliance of orders or instructions', 'description' => 'Whoever fails to comply with any order or direction given under this Act within such time as may be specified in the said order or direction or any of the provisions of this Act or any rules or regulations made thereunder violates or attempts to violate or abets, it shall be punishable in respect of each offense with imprisonment for a term which may extend to three months, or with fine which may extend to one lakh rupees, or with both, and for continued failure shall be punishable with an additional fine which may extend to five thousand rupees for each day during which such failure continues after the first conviction of such offense (Provided that nothing contained in this section shall be subject to the provisions of section 121) (shall not apply to the orders, instructions or directives issued under)', 'punishment' => 'Imprisonment up to 3 months or penalty up to 1,00,000 rupees', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 33, 'dept' => 'Licenses', 'service' => 'Legal Metrology Act 2009', 'act' => 'Legal Metrology Act 2009', 'section' => '23', 'description' => 'Prohibition on manufacture, repair or sale of weight or measure with Prohibition on manufacture, repair or sale of weight or measure without licence.(1) No person shall manufacture, repair or sell, or offer, expose or possess for repair or sale, any weight or measure unless he holds a licence issued by the Controller under sub-section (2): Provided that no licence to repair shall be required by a manufacturer for repair of his own weight or measure in a State other than the State of manufacture of the same. (2) For the purpose of sub-section (1), the Controller shall issue a licence in such form and manner, on such conditions, for such period and such area of jurisdiction and on payment of such fee as may be prescribed. out licence.(1) No person shall manufacture, repair or sell, or offer, expose or possess for repair or sale, any weight or measure unless he holds a licence issued by the Controller under sub-section (2)', 'punishment' => 'Will be punishable with fine, which may extend to five thousand rupees.', 'trigger' => 'Breach of Act or Rule'],
        ['sno' => 34, 'dept' => 'Legal Metrology', 'service' => 'Renewals', 'act' => 'Chhattisgarh Legal Metrology (Enforcement) Rule 2011', 'section' => '11(2)', 'description' => 'Every manufacturer or repairer of, or dealer in weight or measure shall make an application for the renewal of a licence within thirty days before the expiry of validity of the licence to the Controller Legal Metrology or such other officer as may be authorized by him in this behalf, in the appropriate Form set out in Schedule II-B.Will be punishable with fine, which may extend to five thousand rupeesBreach of Act or Rule', 'punishment' => 'Will be punishable with fine, which may extend to five thousand rupees', 'trigger' => 'Breach of Act or Rule'],
        ['sno' => 35, 'dept' => 'Legal Metrology', 'service' => 'Verifications', 'act' => 'Legal Metrology Act 2009', 'section' => '24', 'description' => 'Verification and stamping of weight or measure.(1) Every person having any weight or measure in his possession, custody or control in circumstances indicating that such weight or measure is being, or is intended or is likely to be, used by him in any transaction or for protection, shall, before putting such weight or measure into such use, have such weight or measure verified at such place and during such hours as the Controller may, by general or special order, specify in this behalf, on payment of such fees as may be prescribed. (2) The Central Government may prescribe the kinds of weights and measures for which the verification is to be done through the Government approved Test Centre. (3) The Government approved Test Centre shall be notified by the Central Government or the State Government, as the case may be, in such manner, on such terms and conditions and on payment of such fee as may be prescribed. (4) The Government approved Test Centre shall appoint or engage persons having such qualifications and experience and collect such fee on such terms and conditions for the verification of weights and measures specified under sub-section (2) as may be prescribed.', 'punishment' => 'Will be punishable with fine, which may Not be less than 2 thousand but may extend to five thousand rupees.', 'trigger' => 'Breach of Act or Rule'],
        ['sno' => 36, 'dept' => 'CECB', 'service' => 'CTE/CT', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 41', 'description' => '41 Failure to comply with directions under sub-section (2) or sub-section (3) of section 20, or orders issued under clause (c) of sub-section (1) of section 32 or directions issued under sub-section (2) of section 33 or section 33A.(1) Whoever fails to comply with the direction given under sub-section (2) or sub-section (3) of section 20 within such time as may be specified in the direction shall, on conviction, be punishable with imprisonment for a term which may extend to three months or with fine which may extend to ten thousand rupees or with both and in case the failure continues, with an additional fine which may extend to five thousand rupees for every day during which such failure continues after the conviction for the first such failure. (2) Whoever fails to comply with any order issued under clause (c) of sub-section (1) of section 32 or any direction issued by a court under sub', 'punishment' => 'Imprisonment up to 3 months Penalty up to 10,000/- and in case the failure continues, with an additional fine which may extend to five thousand rupees for every day during which such failure continues after the conviction for the first such failure', 'trigger' => 'Failure to register/ renew consent or violate consent conditions.'],
        ['sno' => 37, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 42', 'description' => '42. Penalty for certain Acts.(1) Whoever (a) destroys, pulls down, removes, injures or defaces any pillar, post or stake fixed in the ground or any notice or other matter put up, inscribed or placed, by or under the authority of the Board, or (b) obstructs any person acting under the orders or directions of the Board from exercising his powers and performing his functions under this Act, or (c) damages any works or property belonging to the Board, or (d) fails to furnish to any officer or other employee of the Board any information required by him for the purpose of this Act, or (e) fails to intimate the occurrence of any accident or other unforeseen act or event under section 31 to the Board and other authorities or agencies as required by that section, or (f) in giving any information which he is required to give under this Act, knowingly or wilfully makes a statement which is false in any material, or (g) for the purpose of obtaining any consent under section 25 or section 26, knowingly or wilfully makes a statement which is false in any material particular', 'punishment' => 'imprisonment up to 03 month and penalty Up to 10,000/-', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 38, 'dept' => 'CECB', 'service' => 'CTE/CT', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 43', 'description' => '43. Penalty for contravention of provisions of section 24. Whoever contravenes the provisions of section 24 shall be punishable with imprisonment for a term which shall not be less than 2 one year and six months but which may extend to six years and with fine.', 'punishment' => 'Imprisonment from one year & six months to Six year.', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 39, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 44', 'description' => '44. Penalty for contravention of section 25 or section 26.Whoever contravenes the provisions of section 25 or section 26 shall be punishable with imprisonment for a term which shall not be less than 2 one year and six months but which may extend to six years and with fine.', 'punishment' => 'Imprisonment from one year & six months to Six year.', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 40, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 45', 'description' => '45. Enhanced penalty after previous conviction.If any person who has been convicted of any offence under section 24 or section 25 or section 26 is again found guilty of an offence involving a contravention of the same provision, he shall, on the second and on every subsequent conviction, be punishable with imprisonment for a term which shall not be less than 2 two years but which may extend to seven years and with fine: Provided that for the purpose of this section no cognizance shall be taken of any conviction made more than two years before the commission of the offence which is being punished.', 'punishment' => 'Imprisonment from two year to seven years.', 'trigger' => 'Breach of Act/Rule'],
        ['sno' => 41, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 45 A', 'description' => 'Act.Whoever contravenes any of the provisions of this Act or fails to comply with any order or direction given under this Act, for which no penalty has been elsewhere provided in this Act, shall be punishable with imprisonment which may extend to three months or with fine which may extend to ten thousand rupees or with both, and in the case of a continuing contravention or failure, with an additional fine which may extend to five thousand rupees for every day during which such contravention or failure continues after conviction for the first such contravention or failure.', 'punishment' => 'Imprisonment up to 03 months', 'trigger' => 'Breach of act/rule'],
        ['sno' => 42, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Water (Prevention and Control of Pollution) Act, 1974', 'section' => 'Section 49', 'description' => 'Cognizance of offences (1) No court shall take cognizance of any offence under this Act except on a complaint made by (a) a Board or any officer authorised in this behalf by it or (b) any person who has given notice of not less than sixty days, in the manner prescribed, of the alleged offence and of his intention to make a complaint, to the Board or officer authorised as aforesaid, and no court inferior to that of a Metropolitan Magistrate or a Judicial Magistrate of the first class shall try any offence punishable under this Act. (2) Where a complaint has been made under clause (b) of sub-section (1), the Board shall, on demand by such person, make available the relevant reports in its possession to that person: Provided that the Board may refuse to make any such report available to such person if the same is, in its opinion, against the public interest.', 'punishment' => 'Imprisonment for a term exceeding two years or of fine exceeding two thousand rupees on any person convicted of an offence punishable under this Act.', 'trigger' => 'Breach of act/rule'],
        ['sno' => 43, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Air (Prevention and Control of Pollution) Act, 1981', 'section' => 'Section 37', 'description' => 'Failure to comply with the provisions of section 21 or section 22 or with the directions issued under section 31A.', 'punishment' => '1) Each such failure, be punishable with imprisonment for a term which shall not be less than one year and six months but which may extend to six years and with fine, and in case the failure continues, with an additional fine which may extend to five thousand rupees for every day during which such failure continues after the conviction for the first such failure. (2) If the failure referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which shall not be less than two years but which may extend to seven years and with fine', 'trigger' => 'Failure to register/ renew consent or violate consent conditions/ directions.'],
        ['sno' => 44, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Air (Prevention and Control of Pollution) Act, 1981', 'section' => 'Section 37', 'description' => 'Failure to comply with the provisions of section 21 or section 22 or with the directions issued under section 31A.', 'punishment' => '1) Each such failure, be punishable with imprisonment for a term which shall not be less than one year and six months but which may extend to six years and with fine, and in case the failure continues, with an additional fine which may extend to five thousand rupees for every day during which such failure continues after the conviction for the first such failure. (2) If the failure referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which shall not be less than two years but which may extend to seven years and with fine', 'trigger' => 'Failure to register/ renew consent or violate consent conditions/ directions.'],
        ['sno' => 45, 'dept' => 'CECB', 'service' => 'CTE/CTO', 'act' => 'Air (Prevention and Control of Pollution) Act, 1981', 'section' => 'Section 39', 'description' => 'Penalty for contravention of certain provisions of the Act.', 'punishment' => 'Punishable with imprisonment for a term which may extend to three months or with fine which may extend to ten thousand rupees or with both, and in the case of continuing contravention, with an additional fine which may extend to five thousand rupees for every day during which such contravention continues after conviction for the first such contravention', 'trigger' => 'Failure to comply with the rules'],
        ['sno' => 46, 'dept' => 'CECB', 'service' => 'Authorization', 'act' => 'Hazardous and Other Wastes (Management and Transboundary) Rules , 2016', 'section' => 'Rule 23 read with Section 15 of The Environment (Protection) Act, 1986Rule 23 read with Section 15 of The Environment (Protection) Act, 1986', 'description' => 'Liability of occupier, importer or exporter and operator of a disposal facility.', 'punishment' => 'Punishable with imprisonment for a term which may extend to three months or with fine which may extend to ten thousand rupees or with both, and in the case of continuing contravention, with an additional fine which may extend to five thousand rupees for every day during which such contravention continues after conviction for the first such contravention', 'trigger' => 'Failure to comply with the rules'],
        ['sno' => 47, 'dept' => 'CECB', 'service' => 'Registration/Renewal', 'act' => 'E-Waste (Management and Handling) Rules , 2016 (Under Chapter III)', 'section' => 'Rule 21 read with Section 15 of The Environment (Protection) Act, 1986 Rule 21 read with Section 15 of The Environment (Protection) Act, 1986', 'description' => 'Liability of manufacturer, producer, importer, transporter, refurbisher, dismantler and recycler.- (1) The manufacturer, producer, importer, transporter, refurbisher, dismantler and recycler shall be liable for all damages caused to the environment or third party due to improper handling and management of the e-waste (2) The manufacturer, producer, importer, transporter, refurbisher, dismantler and recycler shall be liable to pay financial penalties as levied under the provisions of the Environment (Protection) Act, 1986 and rules made thereunder for any violation of the provisions under these rules by the State Pollution Control Board with the prior approval of the Central Pollution Control Board.', 'punishment' => '1) Imprisonment for a term which may extend to five years with fine which may extend to one lakh rupees, or with both, and in case the failure or contravention continues, with additional fine which may extend to five thousand rupees for every day during which such failure or contravention continues after the conviction for the first such failure or contravention. (2) If the failure or contravention referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which may extend to seven years.', 'trigger' => 'Failure to comply with the rules'],
        ['sno' => 48, 'dept' => 'CECB', 'service' => 'Registration/Renewal', 'act' => 'E-Waste (Management and Handling) Rules , 2016 (Under Chapter III)', 'section' => 'Rule 21 read with Section 15 of The Environment (Protection) Act, 1986 Rule 21 read with Section 15 of The Environment (Protection) Act, 1986', 'description' => 'Liability of manufacturer, producer, importer, transporter, refurbisher, dismantler and recycler.- (1) The manufacturer, producer, importer, transporter, refurbisher, dismantler and recycler shall be liable for all damages caused to the environment or third party due to improper handling and management of the e-waste (2) The manufacturer, producer, importer, transporter, refurbisher, dismantler and recycler shall be liable to pay financial penalties as levied under the provisions of the Environment (Protection) Act, 1986 and rules made thereunder for any violation of the provisions under these rules by the State Pollution Control Board with the prior approval of the Central Pollution Control Board', 'punishment' => '1) Imprisonment for a term which may extend to five years with fine which may extend to one lakh rupees, or with both, and in case the failure or contravention continues, with additional fine which may extend to five thousand rupees for every day during which such failure or contravention continues after the conviction for the first such failure or contravention. (2) If the failure or contravention referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which may extend to seven years.', 'trigger' => 'Failure to comply with the rules'],
        ['sno' => 49, 'dept' => 'CECB', 'service' => 'Registration/Renewal', 'act' => 'Plastic Waste Management Rules,2016', 'section' => 'Section 15 of The Environment (Protection) Act, 1986 Section 15 of The Environment (Protection) Act, 1986', 'description' => '', 'punishment' => '1) Imprisonment for a term which may extend to five years with fine which may extend to one lakh rupees, or with both, and in case the failure or contravention continues, with additional fine which may extend to five thousand rupees for every day during which such failure or contravention continues after the conviction for the first such failure or contravention. (2) If the failure or contravention referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which may extend to seven years.', 'trigger' => 'Failure to comply with the rules.'],
        ['sno' => 50, 'dept' => 'CECB', 'service' => 'Authorization', 'act' => 'Bio- Medical Waste Management (Management and Handling) Rules, 2016', 'section' => 'Rule 18 to be read with Section 15 of TheEnvironment(Protection) Act, 1986 Rule 18 to be read with Section 15 of TheEnvironment(Protection) Act, 1986', 'description' => 'Liability of the occupier, operator of a facility.-(1) The occupier or an operator of a common bio-medical waste treatment facility shall be liable for all the damages caused to the environment or the public due to improper handling of bio- medical wastes. (2) The occupier or operator of common bio-medical waste treatment facility shall be liable for action under section 5 and section 15 of the Act, in case of any violation', 'punishment' => '1) Imprisonment for a term which may extend to five years with fine which may extend to one lakh rupees, or with both, and in case the failure or contravention continues, with additional fine which may extend to five thousand rupees for every day during which such failure or contravention continues after the conviction for the first such failure or contravention. (2) If the failure or contravention referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which may extend to seven years', 'trigger' => 'Failure to comply with the rules.'],
        ['sno' => 51, 'dept' => 'CECB', 'service' => 'Authorization', 'act' => 'Construction and Demolition Waste Management (Management and Handling) Rules, 2016', 'section' => 'Section 15 of The Environment (Protection) Act, 1986 Section 15 of The Environment (Protection) Act, 1986', 'description' => '', 'punishment' => '1) Imprisonment for a term which may extend to five years with fine which may extend to one lakh rupees, or with both, and in case the failure or contravention continues, with additional fine which may extend to five thousand rupees for every day during which such failure or contravention continues after the conviction for the first such failure or contravention. (2) If the failure or contravention referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which may extend to seven years.', 'trigger' => 'Failure to comply with the rules.'],
        ['sno' => 52, 'dept' => 'CECB', 'service' => 'Authorization', 'act' => 'Refurbishers and Recyclers under Battery Waste Management Rules 2022', 'section' => 'Rule 13 to be read with Section 15 of The Environment (Protection) Act, 1986 Rule 13 to be read with Section 15 of The Environment (Protection) Act, 1986', 'description' => 'Action on violations and imposition of Environmental Compensation. (1) Environmental Compensation shall also be levied for the following activities based on polluter pays principle, i. entities carrying out activities without registration as mandated under these rules ii. providing false information / wilful concealment of material facts by the entities registered under these rules iii. submission of forged/manipulated documents by the entities registered under these rules iv. entities engaged in collection, segregation, and treatment in respect to not following sound handling of Waste Battery. (2) These activities, may also be dealt with under the provisions of section 15 of the Environment (Protection) Act, 1986, in case of evasion or violation either by entity itself or help abet any obligated entity evade or violate obligations, after giving an opportunity of being heard. (3) Committee for Implementation constituted by Central Pollution Control Board under rule 15 shall prepare and recommend guidelines for imposition and collection of Environmental Compensation from producers and entities involved in refurbishment and recycling of Waste Battery, in case of non-fulfilment of obligations under these rules', 'punishment' => '1) imprisonment for a term which may extend to five years with fine which may extend to one lakh rupees, or with both, and in case the failure or contravention continues, with additional fine which may extend to five thousand rupees for every day during which such failure or contravention continues after the conviction for the first such failure or contravention. (2) If the failure or contravention referred to in sub-section (1) continues beyond a period of one year after the date of conviction, the offender shall be punishable with imprisonment for a term which may extend to seven yearsFailure to comply with the rules.', 'trigger' => 'Failure to comply with the rules.'],
      ];

      // Group provisions by department
      $grouped = [];
      foreach($provisions as $provision) {
        $dept = $provision['dept'];
        if($dept === 'the') $dept = 'Electrical Inspectorate';
        if(!isset($grouped[$dept])) {
          $grouped[$dept] = [];
        }
        $grouped[$dept][] = $provision;
      }

      // Department icons mapping
      $deptIcons = [
        'CSIDC' => 'fa-building',
        'TCP' => 'fa-city',
        'Food and Drug' => 'fa-pills',
        'Firms and Societies' => 'fa-handshake',
        'Home (Fire)' => 'fa-fire',
        'Boiler' => 'fa-industry',
        'Labour' => 'fa-briefcase',
        'CSPDCL' => 'fa-bolt',
        'Electrical Inspectorate' => 'fa-plug',
        'Licenses' => 'fa-id-card',
        'Legal Metrology' => 'fa-weight-scale',
        'CECB' => 'fa-leaf',
      ];
      @endphp

      @foreach($grouped as $dept => $deptProvisions)
      <div class="cp-dept-category" data-dept="{{ $dept }}">
        <div class="cp-dept-header" onclick="toggleDepartment(this)">
          <div class="cp-dept-header-left">
            <div class="cp-dept-icon">
              <i class="fa-solid {{ $deptIcons[$dept] ?? 'fa-folder' }}"></i>
            </div>
            <div class="cp-dept-info">
              <h2 class="cp-dept-name">{{ $dept }}</h2>
              <span class="cp-dept-count">{{ count($deptProvisions) }} Provision{{ count($deptProvisions) > 1 ? 's' : '' }}</span>
            </div>
          </div>
          <div class="cp-dept-toggle">
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>
        <div class="cp-dept-content">
          <div class="cp-dept-cards">
            @foreach($deptProvisions as $provision)
            <div class="cp-card" data-service="{{ strtolower($provision['service']) }}" data-act="{{ strtolower($provision['act']) }}" data-description="{{ strtolower($provision['description']) }}">
              <div class="cp-card-header-row">
                <div class="cp-card-number">{{ $provision['sno'] }}</div>
                <h3 class="cp-card-service">{{ $provision['service'] }}</h3>
              </div>
              <div class="cp-card-body">
                <div class="cp-card-meta">
                  <div class="cp-meta-item">
                    <i class="fa-solid fa-gavel"></i>
                    <div class="cp-meta-content">
                      <span class="cp-meta-label">Act/Rule:</span>
                      <span class="cp-meta-value">{{ $provision['act'] }}</span>
                    </div>
                  </div>
                  <div class="cp-meta-item">
                    <i class="fa-solid fa-paragraph"></i>
                    <div class="cp-meta-content">
                      <span class="cp-meta-label">Section/Clause:</span>
                      <span class="cp-meta-value">{{ $provision['section'] }}</span>
                    </div>
                  </div>
                </div>
                <div class="cp-card-description">
                  <p>{{ $provision['description'] }}</p>
                </div>
                <div class="cp-card-details-grid">
                  <div class="cp-card-punishment">
                    <div class="cp-punishment-icon">
                      <i class="fa-solid fa-exclamation-triangle"></i>
                    </div>
                    <div class="cp-punishment-content">
                      <span class="cp-punishment-label">Punishment:</span>
                      <span class="cp-punishment-text">{{ $provision['punishment'] }}</span>
                    </div>
                  </div>
                  <div class="cp-card-trigger">
                    <div class="cp-trigger-icon">
                      <i class="fa-solid fa-bolt"></i>
                    </div>
                    <div class="cp-trigger-content">
                      <span class="cp-trigger-label">Trigger/Event Point:</span>
                      <span class="cp-trigger-text">{{ $provision['trigger'] }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- No Results Message -->
    <div class="cp-no-results" id="noResults" style="display: none;">
      <i class="fa-solid fa-search"></i>
      <h3>No provisions found</h3>
      <p>Try adjusting your search terms</p>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('searchInput');
  const cards = document.querySelectorAll('.cp-card');
  const departments = document.querySelectorAll('.cp-dept-category');
  const filteredCount = document.getElementById('filteredCount');
  const noResults = document.getElementById('noResults');
  const expandAllBtn = document.getElementById('expandAll');
  let allExpanded = false;

  // Toggle department
  window.toggleDepartment = function(header) {
    const category = header.closest('.cp-dept-category');
    const content = category.querySelector('.cp-dept-content');
    const toggle = header.querySelector('.cp-dept-toggle i');
    
    category.classList.toggle('expanded');
    if (category.classList.contains('expanded')) {
      content.style.maxHeight = content.scrollHeight + 'px';
      toggle.style.transform = 'rotate(180deg)';
    } else {
      content.style.maxHeight = '0';
      toggle.style.transform = 'rotate(0deg)';
    }
  };

  // Expand/Collapse All
  expandAllBtn.addEventListener('click', function() {
    allExpanded = !allExpanded;
    this.textContent = allExpanded ? 'Collapse All' : 'Expand All';
    
    departments.forEach(dept => {
      const header = dept.querySelector('.cp-dept-header');
      const content = dept.querySelector('.cp-dept-content');
      const toggle = dept.querySelector('.cp-dept-toggle i');
      
      if (allExpanded) {
        dept.classList.add('expanded');
        content.style.maxHeight = content.scrollHeight + 'px';
        toggle.style.transform = 'rotate(180deg)';
      } else {
        dept.classList.remove('expanded');
        content.style.maxHeight = '0';
        toggle.style.transform = 'rotate(0deg)';
      }
    });
  });

  // Search functionality
  function filterCards() {
    const searchValue = searchInput.value.toLowerCase().trim();
    let visibleCount = 0;
    let visibleDepts = 0;

    departments.forEach(dept => {
      const deptCards = dept.querySelectorAll('.cp-card');
      let deptHasVisible = false;

      deptCards.forEach(card => {
        const service = card.dataset.service || '';
        const act = card.dataset.act || '';
        const description = card.dataset.description || '';

        const matchesSearch = !searchValue || 
          service.includes(searchValue) || 
          act.includes(searchValue) || 
          description.includes(searchValue);

        if (matchesSearch) {
          card.style.display = 'block';
          visibleCount++;
          deptHasVisible = true;
        } else {
          card.style.display = 'none';
        }
      });

      if (deptHasVisible) {
        dept.style.display = 'block';
        visibleDepts++;
      } else {
        dept.style.display = 'none';
      }
    });

    filteredCount.textContent = visibleCount;
    
    if (visibleCount === 0) {
      noResults.style.display = 'block';
    } else {
      noResults.style.display = 'none';
    }
  }

  searchInput.addEventListener('input', filterCards);

  // Breadcrumb Navigation Scroll
  const breadcrumbContainer = document.getElementById('breadcrumbContainer');
  const breadcrumbPrev = document.getElementById('breadcrumbPrev');
  const breadcrumbNext = document.getElementById('breadcrumbNext');

  function updateBreadcrumbButtons() {
    if (breadcrumbContainer) {
      const scrollLeft = breadcrumbContainer.scrollLeft;
      const scrollWidth = breadcrumbContainer.scrollWidth;
      const clientWidth = breadcrumbContainer.clientWidth;

      if (breadcrumbPrev) {
        breadcrumbPrev.style.display = scrollLeft > 0 ? 'flex' : 'none';
      }
      if (breadcrumbNext) {
        breadcrumbNext.style.display = scrollLeft < scrollWidth - clientWidth - 10 ? 'flex' : 'none';
      }
    }
  }

  if (breadcrumbPrev) {
    breadcrumbPrev.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: -200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbNext) {
    breadcrumbNext.addEventListener('click', () => {
      if (breadcrumbContainer) {
        breadcrumbContainer.scrollBy({ left: 200, behavior: 'smooth' });
      }
    });
  }

  if (breadcrumbContainer) {
    breadcrumbContainer.addEventListener('scroll', updateBreadcrumbButtons);
    updateBreadcrumbButtons();
  }
});
</script>
@endsection
