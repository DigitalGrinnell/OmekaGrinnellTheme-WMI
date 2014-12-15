<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
 
<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<?php if (metadata('item', array('Dublin Core', 'Alternative Title'))): ?>
<p><em>also: </em> <?php echo metadata('item', array('Dublin Core', 'Alternative Title'), array('delimiter' => ', ')); ?></p>
<?php endif; ?>

<?php if (metadata('item', array('Dublin Core', 'Relation'))): ?>
<p><em>similar or related: </em> <?php echo metadata('item', array('Dublin Core', 'Relation'), array('delimiter' => ', ')); ?></p>
<?php endif; ?>


<!-- The following returns all of the files associated with an item. -->
    <?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
        <?php echo files_for_item(array('imageSize' => 'thumbnail')); ?>
    <?php endif; ?>

    <?php if ((get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
        <h2><?php echo __('Files'); ?></h2>
        <?php echo item_image_gallery(); ?>
    <?php endif; ?>


<!-- I think the following returns item relations. Not sure where to put this on the page or even if using it. -->   
    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>


    
<div id="primary">
 
    <!-- The following returns description and bibliography citation. -->
    <h2>Description</h2>
    



<?php echo metadata('item', array('Dublin Core', 'Description')); ?>
    <p></p>
    
    <h2>Bibliographic Citations</h2>
    <?php echo metadata('item', array('Dublin Core', 'Bibliographic Citation'), array('delimiter' => ', ')); ?>

    
</div><!-- end primary -->

 
<aside id="sidebar">
 
<div id="instrumentdetails" class="element"><h2>Instrument Details</h2>
    
    <div class="element-text">
        <h3>Origins</h3>
	<?php if (metadata('item', array('Dublin Core', 'Spatial Coverage'))): ?>
        <p><b><i>continent - </i></b>
        <?php echo metadata('item', array('Dublin Core', 'Spatial Coverage'), array('delimiter' => ' - ')); ?></p>
        <?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Source'))): ?>
        <p><b><i>region - </i></b>
	<?php echo metadata('item', array('Dublin Core', 'Source'), array('delimiter' => ' - ')); ?></p>
        <?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Coverage'))): ?>
        <p><b><i>nation - </i></b>
        <?php echo metadata('item', array('Dublin Core', 'Coverage'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Type'))): ?>
        <p><b><i>formation - </i></b>
        <?php echo metadata('item', array('Dublin Core', 'Type'), array('delimiter' => ', ')); ?></p>
    	<?php endif; ?>
        <?php if (metadata('item', array('Dublin Core', 'Is Part Of'))): ?>
        <h3>Ensembles</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Is Part Of'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
    
        <h3>Classification (Sachs-Von Hornbostel revised by 
            <a href="http://www.mimo-international.com/vocabulary.html">MIMO</a>)</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Subject'), array('delimiter' => ', ')); ?></p>

        <h3>Design and Playing Features</h3>

        <!-- Read definitions of terms from categories.json and populate array to be used in categorize() function -->
        <?php 
        //$string = file_get_contents("categories.json");
        //$glossary = json_decode($string,true);
        $glossary = array (
  'Category' => 
    array (
          'Cordophone' => 
          array (
            'definition' => '(string instrument) musical or sound-producing instrument that has as its primary sounding or vibrating element one or more tensioned string/s',
            'string carrier design' => 
            array (
              'definition' => 'the physical structure that supports the tensioned string/s of a chordophone',
              'harp - bridge' => 'the sound carrier consists of a joined resonator and a neck; strings are tensioned between an endpin on the resonator wall and the neck, and pass over the sides of a tall pressure bridge standing on the resonator soundboard that organizes the strings into two parallel planes that are perpendicular to the plane of the resonator soundboard',
              'harp - frame' => 'the string carrier consists of a joined resonator and neck and a post/pillar that connects the distal ends of the resonator and neck to form a rigid frame; tensioned strings are stretched between the resonator soundboard and the neck, the plane of tensioned strings is perpendicular to the plane of the resonator soundboard',
              'zither - bow' => 'the string carrier is a bow-like flexed length of material the ends of which are connected by a string that is held in tension by the elastic force of the carrier',
              'zither - trough' => 'the string carrier is a box- or bowl-like structure open at its top; strings run across the open cavity from one side of the carrier opening to the opposite side in a plane that is parallel to that of the opening',
              'zither - board' => 'the string carrier consists of a flat sturdy frame to which the string ends are anchored and held in tension; one face of frame is covered by a thin wooden board that serves as a soundboard; the plane of the strings is parallel to that of the soundboard',
              'zither - tube' => 'the string carrier is a length of hollow cylindrical tubing with strings anchored to its exterior walls near both its ends; the plane of the strings parallels that of the tube wall',
              'lute - integral' => 'bi-sectional string carrier consisting of neck and resonator with the plane of strings running roughly parallel to that of the resonator soundboard - the resonator and neck of the lute are carved from a single block of material',
              'lute - joined' => 'bi-sectional string carrier consisting of neck and resonator with the plane of strings running roughly parallel to that of the resonator soundboard - the base of the neck is joined to the sidewall of the resonator',
              'lute - spike' => 'bi-sectional string carrier consisting of neck and resonator with the plane of strings running roughly parallel to that of the resonator soundboard - the base end of the neck penetrates the sidewalls of and passes through the resonator',
              'lute - half-spike' => 'bi-sectional string carrier consisting of neck and resonator with the plane of strings running roughly parallel to that of the resonator soundboard - the base end of the neck penetrates one sidewall of and terminates inside the resonator',
              'lute - yoke' => 'bi-sectional string carrier consisting of neck and resonator with the plane of strings running roughly parallel to that of the resonator soundboard - the base ends of two more-or-less parallel necks penetrate the resonator sidewall, their distal ends connected by a yoke',
            ),
            'resonator design' => 
            array (
              'definition' => 'the design of the component of an instrument in which the energy generated by vibrating strings is amplified',
              'no resonator' => 'no resonating space is built into or added on to the string carrier',
              'mouth on carrier' => 'a performer uses their mouth cavity to resonate vibration of the string carrier',
              'mouth on string' => 'a performer uses their mouth cavity to resonate a vibrating string',
              'non-integral, open vessel' => 'a separate open-vessel resonator is tied to the string carrier and/or the string',
              'open trough' => 'the string carrier itself is an open trough functioning as a general resonating cavity',
              'bowl with wood soundboard' => 'the resonator is bowl-like, its opening covered by a taut membrane functioning as a soundboard',
              'box with wood soundboard' => 'the resonator is box-like (i.e., with sides, top, and bottom) with an open face covered by a thin board of wood functioning as a soundboard',
              'box with membrane soundboard' => 'the resonator is box-like (i.e., with sides, top, and bottom) with an open face covered by a taut membrane functioning as a soundboard',
              'bowl with metal soundboard within box with wood soundboard' => 'a bowl-like resonator, its opening covered by a metal soundboard, is set within a box-like resonator with an open face partially covered by a thin board of wood functioning as a soundboard',
              'ring with wood soundboard' => 'the resonator is ring-like (i.e., a narrow circular or polygonal band) with an opening covered by a thin board of wood functioning as a soundboard',
              'ring with membrane soundboard' => 'the resonator is ring-like (i.e., a narrow circular or polygonal band) with an opening covered by a taut membrane functioning as a soundboard',
              'tube' => 'the string carrier is itself a hollow tube, its interior cavity functioning as a general resonator',
              'tube and non-integral, open vessel' => 'the string carrier is itself a hollow tube its interior cavity functioning as a resonator, and a separate open-vessel resonator is attached to the string carrier',
              'tube with wood soundboard' => 'the resonator is tube-like with one end covered by a thin board of wood functioning as a soundboard',
              'tube with membrane soundboard' => 'the resonator is tube-like with one end covered by a taut membrane functioning as a soundboard',
            ),
            'vibrational length' => 
            array (
              'definition' => 'what parts of the instrument articulate the acoustically active or speaking segment of string/s ',
              'pressure bridge to pressure bridge' => 'vibrational length articulated by contact with two pressure bridges',
              'pressure bridge to ridge-nut' => 'vibrational length articulated by contact with a pressure bridge at one end and with a ridge-nut at the other',
              'pressure bridge to tuning peg' => 'vibrational length articulated by contact with a pressure bridge at one end and with a tuning peg at the other',
              'pressure bridge to tuning ring' => 'vibrational length articulated by contact with a pressure bridge at one end and with a tuning ring at the other',
              'soundboard to tuning peg' => 'vibrational length articulated by contact with a soundboard at one end and with a tuning peg at the other',
              'soundboard to tuning pin' => 'vibrational length articulated by contact with a soundboard at one end and with a tuning pin at the other',
              'soundboard to tension stub' => 'vibrational length articulated by contact with a soundboard at one end and with a stub at the other',
              'string carrier to sliding nut' => 'vibrational length articulated by contact with a tension stub at one end and an adjustable noose at the other',
              'string carrier to string carrier' => 'vibrational length articulated by contact with a string carrier at each end',
            ),
            'string tension control' => 
            array (
              'definition' => 'mechanism by which string tension can be adjusted and set',
              'friction pin' => 'end of string is attached to and wound around a metal pin partially imbedded in a block of wood and held in position by friction; pin is rotatable with the aid of a metal key that fits over exposed end of pin',
              'friction peg' => 'end of string is attached to and wound around the shank of a tapered wood peg imbedded in or passing through a hole/s in a block of wood, a wooden board, or in two walls of a wooden box, and held in position by friction; peg is rotatable by hand ',
              'bushing peg' => 'end of string is attached to and wound around the shank of a cylindrical metal capstan that passes through metal bushing lined holes in the side or back of an instrument’s headstock and held in position by friction; rotatable by hand using the button at one end of the capstan',
              'machine head' => 'end of string is attached to and wound around the shank of a cylindrical metal capstan that passes through holes in the side or back of an instrument’s headstock and has a pinion gear at one end that is rotated with a worm screw mounted on a metal plate; worm screw button is rotated by hand to rotate the capstan',
              'screw' => 'end of string is attached to and wound around the shank of a threaded metal screw that is partially screwed into a block of wood and held in position by friction; screw is rotatable with the aid of a screwdriver',
              'tuning ring' => 'end of string is knotted to a braided ring that fits snugly around a rod-like neck and is held in position by friction; ring can be slid up and down neck by hand to adjust string tension',
              'vertical tension peg' => 'end of string is threaded through a hole in the base of a wood peg and out its side, secured with a knot around the peg shank, peg held vertical to surface of instrument body by tension of string; peg is rotatable by hand',
              'stretch and knot' => 'at time of stringing the free end of a string is pulled tightly and knotted around an immovable part of the string carrier',
            ),
            'method of sounding' => 
            array (
              'definition' => 'how energy it put into a string course to set it into a mode of vibration',
              'plucking (direct)' => 'a string course is flexed and released with a fingertip, fingernail, or handheld plectrum/pick',
              'plucking (indirect)' => 'a string course is flexed and released with a plectrum mounted on a mechanical device operated by depressing a keyboard key',
              'strumming' => 'multiple string courses are flexed and released nearly simultaneously when fingers or a handheld plectrum/pick is swept across them',
              'plucking (direct) and strumming' => 'individual string courses are flexed and released with a fingertip, fingernail, or handheld plectrum/pick, and multiple string courses are flexed and released nearly simultaneously when fingers or a handheld plectrum/pick is swept across them',
              'striking (direct)' => 'a string course is struck with a small handheld beater',
              'striking (indirect)' => 'a string course is struck with a padded hammer mounted on a mechanical device operated by depressing a keyboard key',
              'bowing (direct)' => 'a string course is rubbed roughly perpendicularly to its length with a rosined stick or disc or with stretched fiber',
              'bowing (indirect)' => 'a string course is rubbed roughly perpendicularly to its length with a mechanically-operated rosined disc',
              'bowing (direct) and plucking (direct)' => 'a string course can be either rubbed roughly perpendicularly to its length with rosined bow, or flexed and released with a fingertip, fingernail, or handheld plectrum/pick',
              'plucking (direct) and sympathetically (through air)' => 'some string courses are flexed and released with a fingertip, fingernail, or handheld plectrum/pick, other string courses are set into vibration by pressure waves being transmitted through the air from nearby vibrating string courses ',
              'sympathetically (through string carrier)' => 'physical vibration of the string carrier created by idiophonic means such as scrapping will set a standing string course into vibration',
            ),
            'pitches per string course' => 
            array (
              'definition' => 'the number of pitches that are possible to produce on a string course',
              'one' => 'a string course is sounded only at its full vibrational length and is not otherwise manipulated',
              'two (with partitioning bridge)' => 'two distinct pitches can be produced on a string course with a sliding nut located asymmetrically between the ends of its vibrational length',
              'two (with sliding nut)' => 'two distinct pitches can be produced on a string course with a sliding nut located asymmetrically between the ends of its vibrational length',
              'one and two (with partitioning bridge)' => 'two distinct pitches can be produced on a string course with a sliding nut located asymmetrically between the ends of its vibrational length',
              'two or three (with use of optional tension stub/s)' => 'string courses can be sounded both at their full vibrational length or at one or two shortened lengths articulated by manually or mechanically controlled secondary tension stubs',
              'multiple (by direct free stopping)' => 'any point along the vibrational length of a string course may be firmly pressed with a fingertip, fingernail, or solid object, but not against a surface, to articulate a new vibrational endpoint, changing the active length of the string and the pitch produced',
              'multiple (by indirect free stopping)' => 'specific points along the vibrational length of a string course may be firmly pressed with tangents mounted on mechanical key devices that when depressed articulate new vibrational endpoints, changing the active length of the string and the pitch produced',
              'multiple (by pressure stopping against fretless fingerboard)' => 'any point along the vibrational length of a string course may be firmly pressed with a fingertip or fingernail against a fretless fingerboard to articulate a new vibrational endpoint, changing the active length of the string and the pitch produced',
              'multiple (by pressure stopping against fretted fingerboard)' => 'specific points along the vibrational length of a string course may be firmly pressed with a fingertip or fingernail against a raised fret on a fingerboard to articulate a new vibrational endpoint, changing the active length of the string and the pitch produced',
              'one and multiple (by direct free stopping)' => 'some string course/s sounded only at full length/s, other course/s may be firmly pressed with a fingertip, fingernail, or solid object, but not against a surface, to articulate a new vibrational endpoint, changing the active length of the string and the pitch produced',
              'one and multiple (by indirect free stopping)' => 'some string course/s sounded only at full length/s, other course/s may be firmly pressed at specific points along their vibrational length with tangents mounted on mechanical key devices that when depressed articulate new vibrational endpoints, changing the active length of the string and the pitch produced',
              'one and multiple (by pressure stopping against fretless fingerboard)' => 'some string course/s sounded only at full length/s, other course/s may be firmly pressed at specific points along their vibrational length with a fingertip or fingernail against a fretless fingerboard to articulate a new vibrational endpoint, changing the active length of the string and the pitch produced',
              'one and multiple (by pressure stopping against fretted fingerboard)' => 'some string course/s sounded only at full length/s, other course/s may be firmly pressed at specific points along their vibrational length with a fingertip or fingernail against raised frets on a fingerboard to articulate new vibrational endpoints, changing the active length of the string and the pitch produced',
            ),
      ),
    array (
      'Aerophone' => 
      array (
        'definition' => '[wind instrument] musical or sound-producing instrument that has as its primary sounding or vibrating element a standing air wave in a cavity or an airstream-activated interruptive reed',
        'air cavity design' => 
        array (
          'definition' => 'the shape of the cavity in which the standing air wave, if there is one, is active',
          'no standing wave cavity' => 'the instrument does not work on the principle of an encased standing wave; a free-reed activated by an airstream is the primary vibratory element',
          'globular vessel' => 'precisely or roughly like a globe; rounded, without corners or straight edges',
          'tubular - cylindrical with closed distal end' => 'a tube, whether circular or square in cross-section, with the end furthest from the excitation mechanism closed ',
          'tubular - cylindrical with open distal end' => 'a tube, whether circular or square in cross-section, with the end furthest from the excitation mechanism open',
          'tubular - cylindrical with flaring open distal end' => 'a tube, cylindrical for most of its length, with the end furthest from the excitation mechanism open and flaring',
          'tubular - tapering with open distal end' => 'a tapering tube with the end furthest from the excitation mechanism open',
          'tubular - conical with open distal end' => 'a conical tube with the end furthest from the excitation mechanism open',
          'tubular - conical with flaring open distal end' => 'a conical tube with the end furthest from the excitation mechanism open and flaring',
          'multiple tubular shapes: cylindrical with open distal end; conical with open distal end' => 'an instrument includes: cylindrical tube/s with the end furthest from the excitation mechanism open; conical tube/s with the end furthest from the excitation mechanism open',
          'multiple tubular shapes: cylindrical with closed distal end; cylindrical with open distal end' => 'an instrument includes: cylindrical tube/s with the end furthest from the excitation mechanism closed; cylindrical tube/s with the end furthest from the excitation mechanism open',
          'multiple tubular shapes: cylindrical with closed distal end; cylindrical with open distal end; conical with open distal end; tapering with open distal end' => 'an instrument includes: cylindrical tube/s with the end furthest from the excitation mechanism closed; cylindrical tube/s with the end furthest from the excitation mechanism open; conical tube/s with the end furthest from the excitation mechanism open; tapering tube/s with the end furthest from the excitation mechanism open',
        ),
        'source and direction of airstream' => 
        array (
          'definition' => 'origin of airstream and whether it is directed through the instrument in one or two directions',
          'player exhalation through mouth into air cavity; unidirectional' => 'player exhalation through the mouth directs airstream into air cavity in one direction only',
          'player exhalation through nose into air cavity; unidirectional' => 'player exhalation through the nose directs airstream into air cavity in one direction only',
          'airstream from squeezed sack reservoir of pressurized air channeled into air cavity; unidirectional' => 'player exhalation supplying a sack reservoir that is physically squeezed to send airstream into air cavity in one direction only',
          'mechanically-selected outflow from bellows-supplied reservoir of pressurized air channeled into air cavity; unidirectional' => 'bellows supplied reservoir of pressurized air the controlled outflow from which is channeled into air cavity in one direction only',
          'player exhalation and inhalation through mouth creates airstream through instrument; bidirectional' => 'player exhalation and inhalation through mouth creates airstream through instrument in two directions sequentially',
          'bellows outflow and inflow creates airstream through instrument; bidirectional' => 'stretching and compressing of bellows and the resulting inflow and outflow of air creates airstream through instrument in two directions sequentially',
        ),
        'energy transucer that activates sound' => 
        array (
          'definition' => 'the device that transforms airstream energy into sound wave energy',
          'dull rim at end of tube' => 'unbeveled rim at the end of an open tube',
          'beveled rim at end of tube' => 'beveled rim at the end of an open tube',
          'notched cut in rim at end of tube or in opening of vessel' => 'V-shaped notch cut in the rim at the end of an open tube or the lip of a vessel opening',
          'beveled edge in wall of instrument, directly blown against' => 'a beveled edge chiseled into the side of a vessel or tube',
          'beveled edge in wall of instrument, indirectly blown against with aid of duct' => 'a beveled edge in the wall of a vessel or tube located at the end of a constructed channel',
          'exposed percussion (single) reed' => 'the thinly shaved end of a single pliant reed attached over an aperture in a mouthpiece that is in turn inserted into the end of a tube',
          'exposed idioglot percussion (single) reed' => 'a narrow section of the wall of a tube free at one end but connected to the tube at the other is articulated with a longitudinal cut and serves as a percussion reed that is in turn inserted into the end of a tube',
          'encased percussion (single) reed' => 'the thinly shaved end of a single pliant reed attached over an aperture in a mouthpiece that is inserted into the end of a tube that in turn is encased in a wind chest',
          'exposed concussion (multiple) reed' => 'the thinly shaved ends of two or more pliant reeds secured at their other end to a short length of pipe that is inserted into the end of a tube',
          'encased concussion (multiple) reed' => 'the thinly shaved ends of two or more pliant reeds secured at their other end to a short length of pipe that is inserted into the end of a tube that in turn is encased in a wind chest',
          'lip reed (player’s lips) placed over hole in side of tube' => 'the tensed lips of the player placed over a hole cut into the sidewall of the tube',
          'lip reed (player’s lips) placed over open end of tube' => 'the tensed lips of the player placed over a hole at the end of a tube',
          'lip reed (player’s lips) placed over cup mouthpiece at end of tube' => 'the tensed lips of the player placed over a cup-shaped mouthpiece inserted into the open end of a tube',
          'exposed free reed mounted on wall of tube' => 'a pliant reed/tongue cut from or attached at one end to a closely fitting aperture in a plate (usually metal) mounted on the wall of a tube',
          'encased free reed mounted on wall of tube' => 'a pliant reed/tongue cut from or attached at one end to a closely fitting aperture in a plate (usually metal) mounted on the wall of a resonator tube produces the sound wave; the segment of the tube with the free reed is encased in a wind chest',
          'encased free reed mounted on block' => 'a pliant reed/tongue cut from or attached at one end to a closely fitting aperture in a plate (usually metal) mounted on a block with air channels built into it; the block is encased in a wind chest',
          'multiple mechanisms: beveled edge in wall of instrument, indirectly blown against with aid of duct; encased percussion (single) reed' => 'an instrument includes components with: a beveled edge in the wall of a tube located at the end of a constructed channel; and the thinly shaved end of a single pliant reed attached over an aperture at the end of a tube that in turn is encased in a wind chest',
          'multiple mechanisms: encased percussion (single) reed; encased concussion (multiple) reed' => 'an instrument includes components with: the thinly shaved end of a single pliant reed attached over an aperture in a mouthpiece that is inserted into the end of a tube that in turn is encased in a wind chest; and the thinly shaved ends of two or more pliant reeds secured at their other end to a short length of pipe that is inserted into the end of a tube that in turn is encased in a wind chest',
        ),
        'means of modifying shape and dimensions of standing wave in air cavity' => 
        array (
          'definition' => 'how changes are made to the volume and shape of the air cavity in which a standing wave is produced',
          'none' => 'no mechanism is present to alter the shape or dimensions of a standing wave in an air cavity',
          'inserting hand into bell cavity' => 'the shape or length of a cavity in which a standing wave is produced can be reduced by inserting a clenched hand into the open end of a tube to varying depths',
          'opening fingerholes to reduce space or shorten length of standing wave in air cavity' => 'the shape or length of a cavity in which a standing wave is produced can be altered by the opening and closing of fingerholes drilled into the wall of the instrument’s encasement',
          'incremental lengthening with valve mechanism of air cavity in which the standing wave is active' => 'the basic length of a cavity in which a standing wave is produced can be altered by incremental additions of tubing with the assistance of valve mechanisms',
          'incremental lengthening with telescoping slide of air cavity in which the standing wave is active' => 'the basic length of a cavity in which a standing wave is produced can be altered by incremental additions of tubing with the assistance of a telescoping slide',
          'both none for some components, and opening fingerholes for other components' => 'no mechanism is present to alter the shape or dimensions of a standing wave in the air cavities of some components, while for another component the shape or length of a cavity in which a standing wave is produced can be altered by the opening and closing of fingerholes drilled into the wall of the instrument’s encasement',
        ),
        'overblowing utilization' => 
        array (
          'definition' => 'selection of partials in the overtone series above a fundamental pitch through the technique of overblowing',
          'not used' => 'overblowing not utilized',
          'overblowing at consecutive partials' => 'overblowing utilized to select consecutive overtones in the harmonic series above a fundamental pitch',
          'overblowing at every other partial' => 'overblowing utilized to select every other overtone in the harmonic series above a fundamental pitch',
        ),
        'pitch production' => 
        array (
          'definition' => 'the pitch-producing potential and constraints of each sounding component of an instrument',
          'single pitch - one pitch produced in single air cavity' => 'instrument consists of a single air cavity in which a single pitch is produced',
          'multiple pitches - multiple single-pitch tubes bundled together and activated directly by player' => 'instrument consists of two or more air cavities each of which is used to produce a single pitch; sound produced with airstream directly from player',
          'multiple pitches - multiple single-pitch tubes bundled together and activated indirectly with pitch selection facilitated by a keyboard' => 'instrument consists of two or more air cavities each of which is used to produce a single pitch; sound produced with airstream from reservoir of pressurized air directed to selected air cavities with a keyboard operated by player',
          'multiple pitches - selecting partials of a single cavity’s fundamental through overblowing' => 'instrument consists of a single air cavity in which multiple pitches are produced by selecting overtones in the harmonic series above a fundamental pitch through overblowing',
          'multiple pitches - changing length/shape of standing wave within single cavity with fingerholes' => 'instrument consists of a single air cavity in which multiple pitches are produced by opening and closing fingerholes',
          'multiple pitches - changing length/shape of standing waves within two cavities with fingerholes' => 'instrument consists of two air cavities in which multiple pitches are produced by opening and closing fingerholes',
          'multiple pitches - both one or more single-pitch tubes, and changing length/shape of standing wave within a single tube with fingerholes' => 'instrument consists of one or more air cavities each of which is used to produce a single pitch, and a single air cavity in which multiple pitches are produced by opening and closing fingerholes',
          'multiple pitches - changing length of standing wave within cavity with fingerholes and by selecting partials through overblowing' => 'instrument consists of a single air cavity the basic length of which can be altered by opening and closing fingerholes to produce a series of fundamentals and, with overblowing, their overtones',
          'multiple - changing length of standing wave by adding tube length with valves or slide and by selecting partials through overblowing' => 'instrument consists of a single air cavity the basic length of which can be altered by incremental additions of tubing with the assistance of valve mechanisms to produce a series of fundamentals and, with overblowing, their overtones',
          'multiple pitches - multiple single-pitch free reeds activated directly by player' => 'instrument consists of two or more free reeds each of which is used to produce a single pitch; sound produced with airstream directly from player',
          'multiple pitches - multiple single-pitch free reeds activated indirectly with pitch selection facilitated by a keyboard' => 'instrument consists of two or more free reeds each of which is used to produce a single pitch; sound produced with bellows-generated airstream directed to selected reeds with a keyboard operated by player',
        ),
      ),
    array (
      'Idiophone' => 
      array (
        'definition' => '[e.g., keyed percussion, bell, gong, rattle, etc.] musical or sound-producing instrument that has as its primary sounding/vibrating element solid, sonorous material (e.g., wood, bamboo, gourd, earthenware, metal, or plastic)',
        'basic form of sonorous object/s' => 
        array (
          'definition' => 'the general physical shape of the sonorous material, including whether or not it encloses a hollow cavity',
          'hollow spheroid vessel - closed' => 'a thin-walled spherical or sphere-like shell of sonorous material enclosing a hollow space',
          'hollow spheroid vessel - with opening/s' => 'a thin-walled spherical or sphere-like shell of sonorous material, with one or more openings, surrounding a hollow space',
          'hollow boxlike vessel - closed' => 'a thin-walled rectilinear shell of sonorous material enclosing a hollow space',
          'hollow boxlike vessel - with opening/s' => 'a thin-walled rectilinear shell of sonorous material, with one or more openings, surrounding a hollow space',
          'bell-shaped vessel - with opening' => 'a hollow bell-shaped shell of sonorous material with a circular, ovoid, or rectangular opening the rim of which is particularly active when vibrating',
          'tube - open ended' => 'hollow cylindrical tube open at both ends',
          'tube - open ended with longitudinal opening in wall' => 'hollow cylindrical tube open at both ends and with a lengthwise end-to-end opening in the wall ',
          'tube - closed at one end' => 'hollow cylindrical tube closed at one end; some of the wall of the tube may be partially removed for tuning purposes',
          'tube - closed at both ends' => 'hollow cylindrical tube closed at both ends',
          'coiled spring' => 'a length of elastic spring wire tightly coiled into a cylinder',
          'tongue - heteroglot' => 'elongated free-standing strip of stiff but elastic material - one end must be anchored to a carrier',
          'tongue - idioglot' => 'elongated stiff but elastic strip/s articulated by cuts into a plate or the wall of a tube or box',
          'sandpaper' => 'sheet of sandpaper mounted on flat face of block',
          'plate - flat' => 'a thin and flat plate of sonorous material, often but not necessarily circular in shape',
          'plate - with concentric contouring' => 'a thin circular plate of sonorous material with raised concentric contouring and a relatively flat or up-turned rim that is particularly active when vibrating',
          'plate - contoured with folded-over rim' => 'a thin circular plate of sonorous material with raised contouring that is particularly active when vibrating and with a downward folded rim',
          'plate - contoured with multiple bosses' => 'acoustically active domes/bosses raised from a contoured plate of sonorous material',
          'block - pebble-like' => 'a solid round or ovoid block of sonorous material with one or two flattened surfaces',
          'block - oblong bar' => 'a solid rectilinear or rectilinear-like bar of sonorous material',
          'block - includes flat face with shallow depression' => 'a solid block of sonorous material one face of which has a shallow concave depression in it',
          'block - with hollowed out deep cavity' => 'a solid block of sonorous material with a deep cavity hollowed out often through a long and narrow slit in its surface',
          'rod' => 'a length of solid cylindrical rod',
        ),
        'sound objects per instrument' => 
        array (
          'definition' => 'the number of sonorous objects comprising an instrument and if more than one whether they are sounded discreetly of collectively',
          'one' => 'the instrument consists of one sonorous object',
          'two sounded collectively ' => 'the instrument consists of two sonorous objects always sounded simultaneously ',
          'two sounded discretely ' => 'the instrument consists of two sonorous objects sounded individually ',
          'multiple sounded collectively' => 'the instrument consists of multiple sonorous objects sounded simultaneously',
          'multiple sounded discreetly' => 'the instrument consists of multiple sonorous objects sounded individually or in selected combinations',
        ),
        'resonator design' => 
        array (
          'definition' => 'how any resonating cavities designed into the instrument relate to the sonorous objects they resonate',
          'no resonator' => 'the instrument has no resonator',
          'sonorous object itself is a general resonating space' => 'the shape of the sonorous object itself includes a hollow cavity for resonance ',
          'mouth cavity' => 'the player’s mouth cavity is used as a resonating space',
          'separate resonating space shared by multiple sonorous objects - built into instrument' => 'a general resonating space that resonates multiple sonorous objects is built into the instrument',
          'separate resonating space shared by multiple sonorous objects - temporarily affixed to instrument when played' => 'an independent general resonating space that resonates multiple sonorous objects is attached to the instrument at the time of performance',
          'separate resonating space/s attuned to pitch/es of sonorous object/s - built into instrument' => 'an individual resonating cavity for each sonorous object is built into the instrument',
        ),
        'number of players' => 
        array (
          'definition' => 'the number of players performing the instrument',
          'one' => 'instrument sounded by one player',
          'multiple' => 'instrument sounded by two or more players',
          'one or multiple' => 'instrument sounded either by one player or by two or more players',
        ),
        'sounding principle' => 
        array (
          'definition' => 'how energy is introduced to sonorous object/s and whether or not that energy is delivered directly from the performer',
          'concussing - direct' => 'crashing together two sonorous objects - performer holds and controls both concussed objects or holds one and crashes it against a similar stationary object',
          'concussing - direct with intermediate mechanism' => 'crashing together two sonorous objects - performer controls concussing action through foot-pedal operated mechanism',
          'concussing - indirect' => 'crashing together multiple sonorous objects - performer does not directly hold and control concussed objects',
          'striking - direct' => 'non-sonorous object strikes sonorous object - performer holds and controls beater/s used to strike sonorous object',
          'striking - direct with intermediate mechanism' => 'non-sonorous object strikes sonorous object - performer controls action of individual beaters through keyboard operated mechanism',
          'striking - indirect' => 'non-sonorous objects strike sonorous object - performer holds and moves sonorous object but not the beater/s that strike it',
          'concussing - direct with intermediate mechanism and striking - direct' => 'crashing together two sonorous objects - performer controls concussing action through foot-pedal operated mechanism and/ or striking the sonorous object/s with handheld beater/s ',
          'stamping/pounding ' => 'sonorous object is thrust against non-sonorous object - performer holds and moves sonorous object',
          'scraping' => 'non-sonorous object dragged over notched surface of sonorous object - performer holds and controls beater dragged over sonorous object',
          'friction' => 'rubbing two flat textured surfaces against one another - performer holds and controls both sonorous objects',
          'flexing - direct' => 'stressing/bending of elastic sonorous object/s directly by the performer',
          'flexing - indirect' => 'stressing/bending of elastic sonorous object/s against non-sonorous object',
        ),
        'sound exciting agent' => 
        array (
          'definition' => 'what actually delivers the energy to the sonorous object/s to set it/them into vibration',
          'colliding sonorous objects ' => 'like sonorous objects colliding together',
          'collision with non-sonorous object' => 'collision of a sonorous object with a non-sonorous object',
          'beater/s - palm/s of hand/s' => 'palm/s of performer’s hand/s serve/s as beater/s',
          'beater/s - finger/s' => 'finger/s of performer’s hand/s serve/s as beater/s',
          'beater/s - both palm/s of hand/s and finger/s' => 'both palm/s and finger/s of performer’s hand/s serve as beater/s',
          'beater/s - pellet/s, seed/s, bead/s inside closed vessel/s' => 'pellet/s, seed/s, or bead/s inside closed vessel/s serve/s as beater/s',
          'beaters - pellets, seeds, shells, beads in net around vessel' => 'pellets, seeds, shells or beads woven into loose net around closed vessel serve as beaters',
          'beater/s - stick/s with unpadded tip/s' => 'stick/s with unpadded tip/s serve/s as beater/s ',
          'beater/s - partially padded stick/s ' => 'stick/s padded for part of their length serve/s as beater/s',
          'beater/s - stick/s with padded disc end/s' => 'stick/s with padded disc end/s serve/s as beater/s',
          'beater/s - stick with hard ball end' => 'stick/s with hard ball end/s serve/s as beater/s',
          'beater/s - stick with padded ball end' => 'stick/s with padded ball end/s serve/s as beater/s',
          'beater/s - stick with brush end' => 'stick/s with brush end/s serve/s as beater/s',
          'beater/s - various types ' => 'a variety of padded and unpadded stick beaters may be used',
          'beater/s - mallet-shaped hammer/s' => 'mallet-shaped hammer/s serve/s as beater/s',
          'beater/s - padded keyboard hammer/s' => 'hard felt-padded keyboard-style hammer/s serve/s as beater/s',
          'beater/s - metal rod' => 'metal rod/s serve/s as beater/s',
          'beater - metal ring' => 'metal ring/s serve/s as beater/s',
          'beater - clapper' => 'one or more hard sticks/rods one end of each suspended freely from the internal apex of a bell serve/s as beater/s',
          'beater - tube with slots' => 'tube or bar with slots or troughs along its length in which the closed ends of sonorous tubes are suspended serves as beater',
          'colliding sonorous objects and beater/s - various types' => 'like sonorous objects colliding together and a variety of padded and unpadded stick beaters may be used to strike instrument',
          'fingertip/s, fingernail/s, finger-mounted pick/s ' => 'fingertip/s, fingernail/s, finger-mounted pick/s flex and release elastic sonorous object/s',
          'stub/s' => 'short and thick peg/s projecting from a surface flex/es and release/s elastic sonorous object/s',
          'ridge/s' => 'peaked row/s projecting from a surface flex and release elastic sonorous object/s',
        ),
        'energy input motion by performer' => 
        array (
          'definition' => 'the motion used by the performer to input energy into the instrument',
          'clapping' => 'performer collides sonorous objects together in clapping-like motion',
          'pinching' => 'performer collides sonorous objects together in pinching-like motion of a hand',
          'hammering' => 'performer uses a hammering-like motion to strike the sonorous object',
          'stamping' => 'performer uses a pounding-like motion to strike a sonorous object against something non-sonorous',
          'stomping - leg' => 'performer uses a stomping-like motion of the legs to move sonorous object/s against beaters',
          'shaking' => 'performer forcefully moves instrument or beater to and fro',
          'flipping' => 'performer flips the bottom end of the instrument 180 degrees to become its top end',
          'brushing' => 'performer uses a brushing-like motion across the textured surface of a sonorous object or a row of sonorous objects',
          'plucking' => 'performer plucks sonorous object with fingertip/s',
          'spinning ' => 'performer rapidly turns a sonorous object back and forth on an axis ',
          'slapping' => 'performer strikes the surface of a sonorous object with a slapping motion',
          'tapping - finger' => 'performer strikes sonorous object or keyboard keys with a tapping-like finger motion ',
          'tapping - foot' => 'performer depresses foot pedal with a tapping-like foot motion ',
          'cranking' => 'performer rotates a handle in a circular motion',
          'slapping and tapping - finger/s' => 'performer strikes the surface of a sonorous object both with a slapping motion and a tapping-like finger motion',
          'stamping and shaking' => 'performer uses both a pounding-like motion to strike the sonorous object against a non-sonorous object and forcefully moves instrument to and fro',
          'stamping and slapping' => 'performer uses both a pounding-like motion to strike the sonorous object against a non-sonorous object and strikes the surface of a sonorous object with a slapping motion',
          'hammering and shaking' => 'performer uses both a hammering-like and shaking motion of a beater to strike the sonorous object ',
          'hammering and tapping - foot' => 'performer uses a hammering-like hand motion to strike the sonorous object and also depresses foot pedal with a tapping-like foot motion to concuss sonorous objects',
        ),
        'pitch of sound produced' => 
        array (
          'definition' => 'the pitch clarity of a vibrating sonorous object',
          'indefinite pitch' => 'a sound with a wide spectrum of frequencies none of which is dominant enough to be perceived as an identifiable pitch',
          'relative pitch' => 'a sound with a wide spectrum of frequencies none of which is dominant enough to be perceived as an identifiable pitch but which, when compared to another similar sound, is perceived of as relatively higher or lower',
          'definite pitch' => 'a sound with a structured blend of frequencies one of which is stronger in amplitude than the others and is perceived as an identifiable pitch',
          'inflected pitch' => 'a sound of relative or definite pitch which is perceived to rise or fall in the course of its decay',
        ),
        'sound modification' => 
        array (
          'definition' => 'secondary sound-producing agent/s designed into instrument',
          'none' => 'no secondary sound-producing agent/s designed into instrument',
          'tensioned membrane over hole in resonator' => 'tensioned membrane over hole in resonator wall vibrates sympathetically to the soundwaves inside the resonator space',
          'loose rings or beads threaded on rod' => 'rings or beads threaded onto rod anchored to soundboard of instrument respond with buzzing sound to energy given off by primary sounding objects',
          'bottle caps loosely attached to sonorous surface' => 'bottle caps loosely attached to sonorous surface rattle against that surface in response to energy being released by instrument’s primary sounding objects',
          'changing acoustical shape of resonator with fingerhole/s' => 'opening and closing fingerhole/s on the surface of a resonator modifies its sound waves to create ‘wow’ effect',
          'changing shape of mouth cavity to amplify partials of the fundamental sound' => 'selectively amplifying partials of a fundamental sound produced on a sonorous object by changing shape of resonator cavity (mouth of performer)',
        ),
      ),
    array (
      'Membranophone' => 
      array (
        'definition' => '[drum] musical or sound-producing instrument that has as its primary sounding/vibrating element one or more tensioned membrane/s',
        'number of drums comprising instrument' => 
        array (
          'definition' => 'does the instrument consist of a single unit or multiple units under the control of one or more players',
          'single drum' => 'one player produces sounds on one drum',
          'pair of drums' => 'one player produces sounds on two drums of the same or similar design',
          'variable number of drums' => 'one player produces sounds on from one to several drums of the same or similar design; the precise number used is not always the same',
        ),
        'shell design' => 
        array (
          'definition' => 'the basic form (vessel-like, with a single opening, or tube-like, with two openings) and general exterior shape of the shell/body of the membranophone',
          'vessel with opening' => 'a shell with a single opening; its exterior shape can vary from nearly globular to pot-like, kettle-like, bowl-like, or vase-like',
          'tubular - frame' => 'a tubular shell in the form of a frame, round or polygonal, the depth of which is less than a quarter of the diameter of its openings ',
          'tubular - cylindrical' => 'a tubular shell the end openings of which are of the same diameter and whose sides are straight, like a pipe',
          'tubular - barrel' => 'a shell the end openings of which are of the same diameter and whose sides are symmetrically arched outwards, like those of a barrel',
          'tubular - compound-conical' => 'a tubular shell the end openings of which are of the same diameter and whose sides symmetrically taper outwards to a midpoint, like two cones joined at their larger openings',
          'tubular - hourglass' => 'a tubular shell the end openings of which are of the same diameter and whose sides are symmetrically in-curving so that the diameter at the middle of the shell is less than at its ends, like an hourglass',
          'tubular - conical' => 'a tubular shell the end openings of which are of different diameters and whose sides taper evenly from the large opening to the small one, like a truncated cone',
          'tubular - bulging-conical' => 'a tubular shell the end openings of which are of different diameters and whose sides bulge outwards from the larger opening before tapering to the smaller opening',
          'tubular - goblet' => 'a tubular shell the end openings of which are of different diameters and whose sides have a bowl-like profile from the larger opening to their midpoint and a stem-like cylindrical or conical profile from there to the smaller opening, like a goblet',
          'tubular - pedestal' => 'a tubular shell the end openings of which are of different diameters and whose sides are cylinder-like overall except for a sudden constriction near its pedestal- or foot-like base',
          'tubular - cylindrical-conical' => 'a tubular shell the end openings of which are of different diameters and whose sides are cylinder-like at the larger opening end and conical-like at the smaller opening end',
        ),
        'number and function of membranes' => 
        array (
          'definition' => 'the number of membranes mounted on the shell and whether each is directly sounded or for resonance',
          'one, for sounding' => 'a single membrane is mounted on the shell and is sounded directly',
          'two, both for sounding' => 'two membranes are mounted on the shell and both are sounded directly ',
          'two, one for sounding and one for resonance ' => 'two membranes are mounted on the shell, one sounded directly, the other indirectly by pressure waves from the former',
        ),
        'membrane design' => 
        array (
          'definition' => 'whether or not a membrane is mounted on a frame and if so the nature of that frame',
          'unframed' => 'membrane is not given any sort of added support',
          'framed by a flexible belt ' => 'edge of membrane is directly laced to the top edge of a belt made from a flexible material',
          'framed with pliant rope hoop' => 'edge of membrane is either tucked around a hoop made of rope or the rope is threaded through holes punched into the membrane near its edge',
          'framed with stiff woven hoop' => 'multiple strands of rawhide lacing pass through holes punched into the membrane near its edge and are woven into a stiff hoop',
          'framed with rigid flesh hoop' => 'edge of membrane is tucked around or otherwise fastened to a hoop made of wood, metal, or other rigid material',
        ),
        'membrane attachment' => 
        array (
          'definition' => 'the mechanism by which the membrane/s of a drum is/are connected to its shell',
          'unframed membrane glued to shell' => 'the unframed edge of the membrane is folded over the shell rim and glued to the exterior wall of the shell',
          'unframed membrane nailed to shell' => 'the unframed edge of the membrane is folded over the shell rim and secured to the exterior wall of the shell with nails or tacks, or with pegs pounded into drilled holes in the shell',
          'unframed membrane laced to shell' => 'the unframed edge of the membrane is folded over the shell rim and secured with lacing that runs from holes in the membrane edge to a counter-ring that encircles the shell',
          'unframed membrane lapped over pegs protruding from shell' => 'holes near circumference of membrane are lapped over several pegs that are pounded into holes around the shell; in addition there can also be indirect lacing connecting the membrane to the pegs',
          'unframed membrane laced to unframed membrane' => 'the unframed edge of the membrane is folded over a shell rim and directly laced to the unframed edge of another membrane folded over the other shell rim ',
          'framed membrane nailed to shell' => 'belt-framed edge of the membrane is secured to the exterior wall of the shell with nails or tacks, or with pegs pounded into drilled holes in the shell',
          'framed membrane hoop laced to shell contour' => 'lacing runs back and forth between the membrane hoop and a part of the shell with a smaller circumference than that of the head hoop',
          'framed membrane hoop laced to ring' => 'lacing runs back and forth between the membrane hoop and a ring around a part of the shell with a smaller circumference than that of the head hoop',
          'framed membrane hoop laced to pegs protruding from shell' => 'lacing runs back and forth between the membrane hoop and around several pegs that are partially pounded into holes around the shell',
          'framed membrane hoop laced to framed membrane hoop' => 'lacing runs back and forth between the membrane hoop of one head and the membrane hoop of a second head',
          'framed membrane hoop connected by screw rods to counterhoop' => 'screw rods pressing down upon the membrane hoop of a head are connected to a counterhoop around the shell',
          'counterhoop over framed membrane hoop laced to counterhoop over framed membrane hoop' => 'lacing runs back and forth between a stiff counterhoop pressing down upon the membrane hoop of one head and a stiff counterhoop pressing down upon the membrane hoop of a second head',
          'counterhoop over framed membrane hoop connected by screw rods to counterhoop over framed membrane hoop' => 'screw rods attached to a stiff counterhoop pressing down upon the membrane hoop of one head are connected to a stiff counterhoop pressing down upon the membrane hoop of a second head',
          'counterhoop over framed membrane hoop connected by screw rods to counterhoop against shell contour' => 'screw rods attached to a stiff counterhoop pressing down upon the membrane hoop of a head are connected to a ring around a part of the shell with a smaller circumference than that of the head hoop',
          'counterhoop over framed membrane hoop connected by screw rods to brackets attached to shell' => 'screw rods attached to a stiff counterhoop pressing down upon the membrane hoop of a head are connected to brackets securely attached around the shell',
          'counterhoop over framed membrane hoop connected by cables to clutch-controlled disc ' => 'cables attached to a stiff counterhoop pressing down upon the membrane hoop of a head are connected to the rim of a clutch-controlled disc centered below the shell',
        ),
        'membrane tension control' => 
        array (
          'definition' => 'the nature of the device used to set and/or control the amount and evenness of membrane tension ',
          'none, tension set at time of manufacture' => 'there is no device for membrane tension adjustment built into the drum ',
          'adjusting depth of pegs in shell' => 'tension controlled by adjusting the depth in the shell of tuning pegs that are laced to the membrane hoop',
          'adjusting position of sliding frame within shell against attached membrane ' => 'increasing and decreasing the pressure of a sliding frame against an attached membrane varies the degree of membrane tension',
          'pulling directly on lacing' => 'tension of the heads is achieved by pulling on each section of zigzag lacing consecutively until all slack is removed',
          'sliding rings joining adjacent laces' => 'rings around V-shaped lacing between framed membranes are slid up or down the shell to adjust membrane tension',
          'sliding dowels between lacing and shell' => 'dowels under V-shaped lacing between framed membranes are slid up or down the shell to adjust membrane tension',
          'wedges between counterhoop and shell' => 'tension controlled by adjusting the depth of wedges between the shell and a counterhoop that is laced to the membrane hoop ',
          'rotating screw rods or bolts' => 'threaded tension rods running between two counterhoops or between a counterhoop and brackets attached to the shell can be rotated to change head tension',
          'foot-operated tensioning system' => 'manipulation of a foot pedal connected to the membrane counterhoop by cables changes membrane tension',
          'hugging/squeezing lacing' => 'applying pressure by squeezing the lacing of a double-headed hourglass-shaped drum to change membrane tension',
        ),
        'sounding' => 
        array (
          'definition' => 'how and with what the energy needed to set the membrane/s into vibration is applied ',
          'striking directly with one hand' => 'energy is applied to membrane using the palm and/or digits of a single hand',
          'striking directly with both hands' => 'energy is applied to membrane/s using the palms and/or digits of both hands',
          'striking with one handheld beater' => 'energy is applied to membrane with a beater held in one hand',
          'striking with two handheld beaters' => 'energy is applied to membrane/s with a pair of beaters held one in each hand',
          'striking with one hand and one handheld beater' => 'energy is applied to membrane/s with the palm and/or digits of a one hand and with a beater held in the other hand',
          'striking with variable combinations of hand and handheld beaters' => 'energy is applied to membrane/s with either both hands, two handheld beaters, or one hand and one handheld beater.',
          'striking indirectly with pellet beaters' => 'pellets at the end of strings attached to the drum shell strike the membranes when the drum is rapidly rotated back and forth',
          'striking with foot-operated beater' => 'energy is applied to membrane using beater mounted to a foot-operated mechanism',
          'friction' => 'energy is applied to membrane by rubbing it either directly with some part of the hand or indirectly by rotating the tip of a stick inserted into a nipple formed at the center of the membrane',
        ),
        'sound modifiers' => 
        array (
          'definition' => 'secondary sound producing devices designed into the instrument',
          'none' => 'no secondary sound producing devices designed into instrument',
          'snare/s across membrane' => 'rope/s or beaded wire/s stretched across a membrane act as secondary beater/s when the membrane with which they are in contact is vibrating ',
          'concussion cymbals built into shell' => 'pairs of cymbals wired into slits in the drum shell concuss when energy is applied to the instrument',
          'seeds or pellets inside closed shell ' => 'internal seeds act as secondary beaters when the membrane with which they are in contact is vibrating',
          'membrane-covered hole in shell, sounded sympathetically' => 'a membrane stretched over a hole in the drum shell vibrates sympathetically to the soundwaves inside the resonator space',
        )
    )
  )
)

        ?>


        <p><b><i>category - </i></b>
	<?php echo metadata('item', array('Item Type Metadata', 'Category'), array('delimiter' => ', ')); ?></p>
    <?php echo $glossary['cordophone']['definition']; ?>

        <p><b><i>category</i></b> - 
	<?php echo metadata('item', array('Item Type Metadata', 'Category'), array('delimiter' => ', ')); ?></p>


<!-- following gives the category features for aerophones -->
<?php if (metadata('item', array('Item Type Metadata', 'air cavity design'))): ?>
	<p><b><i>air cavity design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'air cavity design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'source and direction of airstream'))): ?>
	<p><b><i>source and direction of airstream</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'source and direction of airstream')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'energy transducer that activates sound'))): ?>
	<p><b><i>energy transducer that activates sound</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'energy transducer that activates sound')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity'))): ?>
	<p><b><i>means of modifying shape and dimensions of standing wave in air cavity</i></b> - 
	<?php echo metadata('item', array('Item Type Metadata', 'means of modifying shape and dimensions of standing wave in air cavity')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'overblowing utilization'))): ?>
	<p><b><i>overblowing utilization</i></b> - 
	<?php echo metadata('item', array('Item Type Metadata', 'overblowing utilization')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitch production'))): ?>
	<p><b><i>pitch production</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'pitch production')); ?></p>
<?php endif; ?>

<!-- following gives the category features for chordophones -->
<?php if (metadata('item', array('Item Type Metadata', 'string carrier design single drum'))): ?>
	<p><b><i>string carrier design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'string carrier design single drum')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'resonator design, chordophone'))): ?>
	<p><b><i>resonator design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'resonator design, chordophone')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'string courses'))): ?>
	<p><b><i>string courses</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'string courses')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'vibrational length'))): ?>
	<p><b><i>vibrational length</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'vibrational length')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'string tension control'))): ?>
	<p><b><i>string tension control</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'string tension control')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'method of sounding'))): ?>
	<p><b><i>method of sounding</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'method of sounding')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitches per string course'))): ?>
	<p><b><i>pitches per string course</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'pitches per string course')); ?></p>
<?php endif; ?>

<!-- following gives the category features for idiophones -->
<?php if (metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s'))): ?>
	<p><b><i>basic form of sonorous object/s</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'basic form of sonorous object/s')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded'))): ?>
	<p><b><i>sound objects per instrument</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound objects per instrument and how sounded')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'resonator design'))): ?>
	<p><b><i>resonator design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'resonator design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'number of players'))): ?>
	<p><b><i>number of players</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'number of players')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sounding principle'))): ?>
	<p><b><i>sounding principle</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sounding principle')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound exciting agent'))): ?>
	<p><b><i>sound exciting agent</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound exciting agent')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'energy input motion by performer'))): ?>
	<p><b><i>energy input motion by performer</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'energy input motion by performer')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'pitch of sound produced'))): ?>
	<p><b><i>pitch of sound produced</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'pitch of sound produced')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound modification'))): ?>
	<p><b><i>sound modification</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound modification')); ?></p>
<?php endif; ?>

<!-- following gives the category features for membranophones -->
<?php if (metadata('item', array('Item Type Metadata', 'number of drums comprising instrument'))): ?>
	<p><b><i>number of drums comprising instrument</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'number of drums comprising instrument')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'shell design'))): ?>
	<p><b><i>shell design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'shell design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'number and function of membranes'))): ?>
	<p><b><i>number and function of membranes</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'number and function of membranes')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane design'))): ?>
	<p><b><i>membrane design</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'membrane design')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane attachment'))): ?>
	<p><b><i>membrane attachment</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'membrane attachment')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'membrane tension control'))): ?>
	<p><b><i>membrane tension control</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'membrane tension control')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sounding'))): ?>
	<p><b><i>sounding</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sounding')); ?></p>
<?php endif; ?>
<?php if (metadata('item', array('Item Type Metadata', 'sound modifiers'))): ?>
	<p><b><i>sound modifiers</i></b> - <?php echo metadata('item', array('Item Type Metadata', 'sound modifiers')); ?></p>
<?php endif; ?>


        <h3>Dimensions</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Format'), array('delimiter' => ', ')); ?></p>
    
        <h3>Primary Materials</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Medium'), array('delimiter' => ', ')); ?></p>
        
        <?php if (metadata('item', array('Dublin Core', 'Publisher'))): ?>
        <h3>Maker</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Publisher'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>
 
        <?php if (metadata('item', array('Dublin Core', 'Extent'))): ?>
        <h3>Model</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Extent'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>

        <?php if (metadata('item', array('Dublin Core', 'Contributor'))): ?>
        <h3>Entry Author</h3>
        <p><?php echo metadata('item', array('Dublin Core', 'Contributor'), array('delimiter' => ', ')); ?></p>
        <?php endif; ?>

    </div>
</div>

<!-- The following prints a citation for this item. -->
 <div id="item-citation" class="element">
	<h2><?php echo __('Citation'); ?></h2>
	<div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
	</div>
</div>

 
</aside>

 
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
 
<?php echo foot(); ?>
