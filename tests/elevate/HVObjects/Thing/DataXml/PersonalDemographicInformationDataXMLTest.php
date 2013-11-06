<?php
/** @author troussos * */

namespace elevate\test\HVObjects\Thing\DataXML\Type;

use elevate\HVObjects\Generic\Name;
use elevate\HVObjects\Thing\DataXML\Type\PersonalDemographicInformationType;
use elevate\HVObjects\Thing\DataXML\PersonalDemographicInformationDataXML;
use elevate\test\HVObjects\BaseObjectTest;
use elevate\HVObjects\Generic\CodableValue;
use elevate\HVObjects\Generic\CodedValue;
use elevate\HVObjects\Generic\Date\DateTime;
use elevate\HVObjects\Generic\Date\Date;
use elevate\HVObjects\Generic\Date\Time;
use elevate\HVObjects\Generic\Common;

class PersonalDemographicInformationDataXMLTest extends BaseObjectTest
{

    public static function setUpBeforeClass()
    {
        self::$sampleXMLPath = __DIR__ . '/../../SampleXML/Thing/DataXml/PersonalDemographicInformation.xml';
        self::$objectNamespace = 'elevate\HVObjects\Thing\DataXML\PersonalDemographicInformationDataXML';

        $titleCode = new CodedValue('Sir', 'Royalty', array('family-codes'), array('Version 4'));
        $title = new CodableValue('Sir', array($titleCode));
        $suffixCode = new CodedValue('III', 'suffix', array('suffix-family'),array('Version 1'));
        $suffix = new CodableValue('The Third', array($suffixCode));
        $name = new Name('Sir Billy The Intern III', $title, 'Billy', 'The', 'Intern', $suffix);

        $time = new Time('2', '30', '10');
        $date = new Date('2013','2', '11');
        $birthdate = new DateTime($date, $time);

        $bloodCode = new CodedValue('A+', 'Blood Types', array('blood-family'), array('Version 5'));
        $bloodtype = new CodableValue('A Positive', array($bloodCode));

        $ethnicityCode = new CodedValue('Caucasin', 'Ethnicity Types', array('eth-family'), array('Version 8'));
        $ethnicity = new CodableValue('Caucasin', array($ethnicityCode));

        $ssn = '123-45-6789';

        $maritalStatusCode = new CodedValue('Married', 'married', array('martial-status-family'), array('Version 18'));
        $maritalStatus = new CodableValue('Married', array($maritalStatusCode));

        $employmentStatus = 'Employed';

        $isDeceased = TRUE;

        $deathDate = new Date('2012', '11', '5');
        $deathTime = new Time('12', '45', '56');
        $dateOfDeath = new DateTime($deathDate, $deathTime);

        $religonCode = new CodedValue('Christian', 'religon', array('religon-family'), array('Version 4'));
        $religon = new CodableValue('Christian', array($religonCode));

        $isVeteran = FALSE;

        $educationCode = new CodedValue('GED', 'Education Type', array('education-family'), array('Version 65'));
        $highestEducationLevel = new CodableValue('GED', array($educationCode));

        $isDisabled = FALSE;

        $organDonor = 'Not the eyes';

         $dataXML = new PersonalDemographicInformationType(
            $name,
            $birthdate,
            $bloodtype,
            $ethnicity,
            $ssn,
            $maritalStatus,
            $employmentStatus,
            $isDeceased,
            $dateOfDeath,
            $religon,
            $isVeteran,
            $highestEducationLevel,
            $isDisabled,
            $organDonor
        );

        $common = new Common('Notes', 'Source', 'tag, tag2, tag3');

        self::$testObject = new PersonalDemographicInformationDataXML($dataXML, $common);
        parent::setUpBeforeClass();
    }
}
 