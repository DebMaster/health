-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 02:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `advice` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `day` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `type`, `advice`, `time`, `day`, `created`) VALUES
(2, 'Normal', 'Sleep', '1', '0', '2018-03-25 17:36:02'),
(3, 'Normal', 'Sleep', '2', '1', '2018-03-27 20:09:11'),
(4, 'Overweight', 'Wake up and take a jog', '5', '2', '2018-04-04 09:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` enum('Doctor','Administrator') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `phone`, `type`, `created`) VALUES
(1, 'Delon Mukupe', 'gabby&kuda', '0773553312', 'Administrator', '0000-00-00 00:00:00'),
(3, 'Tendai Mwarumba', 'gabby&kuda', '0773553312', 'Doctor', '2016-12-18 00:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`id`, `type`, `message`, `created`) VALUES
(9, 'Underweight', 'There are quite a number of risks associated with these group of  people.\r\nImpaired Immunity: Stick to food that are rich in nutrients like whole grains, fruits, vegetables, dairy products, nuts and seeds and lean proteins\r\n\r\n\r\n.\r\n\r\n\r\n\r\n\r\n\r\n', '2018-03-03 12:06:25'),
(10, 'Overweight', 'Being overweight increases the risks to many health problems .If one is pregnant it may lead to short and long-term health problems for the baby and  the mother.\r\nStroke :It happens when the flow of blood to a part of the brain stops causing brain cells to die. The most common of stroke is called the ischemic stroke it occurs when a blood clot blocks an artery that carries blood to the brain. Being overweight leads to increase in blood pressure which in turn leads to strokes.\r\n', '2018-03-03 11:10:58'),
(11, 'Overweight', '1.Lower blood pressure through reducing the salt intake in your diet not more that 1500 milligrams a day about half a teaspoon.\r\n', '2018-03-03 11:11:30'),
(12, 'Overweight', '2.Avoid eating high-cholesterol foods such as burgers or rather have them in moderate amounts maybe one cheat meal a week or use healthy alternatives when making them such as heba banting bread unprocessed beef  patties cooked in virgin oil.\r\n', '2018-03-03 11:12:07'),
(13, 'Overweight', '3.Eat four to five cups of fruits and vegetables everyday,one serving of fish two or three times a week and several daily servings of whole grains and low-fat dairy.\r\n', '2018-03-03 11:12:36'),
(14, 'Overweight', '4.Get more exercises perhaps walk short distances rather than using the car or using the staircase instead of the elevator at least 30 minutes activity a day.\r\n', '2018-03-03 11:13:52'),
(15, 'Overweight', 'Sleeping Problems: Involves snoring loudly or temporarily stopping breathing whilst sleeping its a common disorder  for people who are overweight.\r\n1Make the room comfortable and inviting for sleep it should be dark ,quiet and warm. If you can shut out the light try using block lights or sleeping masks .Having more regular sleeping hours will help to increase the metabolism rate and may help individuals to lose weight as you sleep.\r\n', '2018-03-03 11:14:25'),
(16, 'Overweight', '2.Eating well avoid eating heavy meals before bed since the body will use more energy trying to break down the food rather than using the energy for sleeping. Rather eat foods such as yoghurt that speed up metabolism and avoid starchy foods.\r\n', '2018-03-03 11:14:53'),
(17, 'Overweight', '3.Can take part in exercises such as yoga that help to slow down the breathing rate, heart rate and brain activity a busy brain will keep you from sleep.\r\n', '2018-03-03 11:15:25'),
(18, 'Overweight', 'Type 2 Diabetes: It is the most common type of diabetes though it is mostly genetic other factors such as poor diet excess body weight may lead to it.\r\n1.Eating a balanced diet helps to reduce the risk of type 2 diabetes.\r\n2.Having adequate sleep\r\n3.Exercises.\r\n\r\n', '2018-03-03 11:16:00'),
(19, 'Overweight', 'Fatty Liver Disease: Also known as nonalcoholic steatohepatitis(NASH) occurs when fat builds up in the liver and causes injury. In turn it may lead to severe liver damage ,cirrhosis(scar tissue) or even liver failure.\r\n1.Choose a healthy diet plant based that\'s rich in fruits,v vegetables wholegrains and healthy fats such as chicken skin.\r\n2.Exercises such as planks and lunges that really do not take time but work up the whole body. Prefer walking on short distances as well at the use of stairs and also about 250 rope jumps per day.\r\n3.Dietary supplements such as omega 3 that contain healthy oil such as fish oil they help to lower triglycerides levels.\r\n\r\n', '2018-03-03 11:20:18'),
(20, 'Underweight', 'Osteoporosis: This causes weak gums it causes fragile bones in later life. It also weakens the vertebrate causing people to slouch as they age.', '2018-03-03 11:59:39'),
(21, 'Underweight', '1.Stronger bones can be build by indulging in weight bearing exercises for example doing squats with the aid of weights on shoulders. The use of weights also termed as resistance training during push-ups. A lot physical activities such as walking or running ,jumping rope and climbing stairs even chores will increase bone mass.', '2018-03-03 12:01:08'),
(22, 'Underweight', '2.Eating plants and fermented foods since they contain a number of bone friendly nutrients such as Calcium,Magnesium,Pottassium, Vitamin K ,Vitamin C and protein.\r\nEdible plants such as fruits and vegetables help to provide anti-inflammatory agents and axiodants.It is also linked to the development of better bone mass. \r\nInclude foods such as yoghurt, kimchi sour milk the positively affect the bone in that they contain probiotics of which these good microbes support a healthy population of gut microbes.', '2018-03-03 12:02:23'),
(23, 'Underweight', 'Fertility problems: Women may not menstruate on a regular basis this may interfere with fertility in the wrong run it skews ovulation and makes it difficult to sustain a healthy pregnancy.Irregular cycles cause the thinning of the endometrium this causes fertilized egg to find it hard to implant in the uterus. In case of conception it may lead in miscarriages and the birth of pre-term babies.', '2018-03-03 12:03:18'),
(24, 'Underweight', 'Fertility problems: Women may not menstruate on a regular basis this may interfere with fertility in the wrong run it skews ovulation and makes it difficult to sustain a healthy pregnancy.Irregular cycles cause the thinning of the endometrium this causes fertilized egg to find it hard to implant in the uterus. In case of conception it may lead in miscarriages and the birth of pre-term babies.', '2018-03-03 12:04:05'),
(25, 'Underweight', '1.Gaining weight will not only help in conceiving but also in having a safe pregnancy .Add healthy calories to your diet such as almonds, sunflower seeds, fruit, whole wheat foods and wheat toast.', '2018-03-03 12:05:00'),
(26, 'Underweight', '2.Instead of empty calories and junk foods consider eating high-protein meats such as brown rice and iron rich foods such as red meat, green vegetables and cereals.', '2018-03-03 12:05:48'),
(27, 'Underweight', '3.Eat mini-meals to help with poor appetite due to emotions or emotional issues. Snack away during the day.\r\n\r\n', '2018-03-03 12:06:42'),
(28, 'Overweight', 'Stress incontinence:Urine leaking when laughing coughing etc kegel exercisesz can help to avoid urinary bladder leakage.', '2018-03-03 12:25:58'),
(29, 'Normal', 'If you can get through the day without taking at least 4 cups or coffee or energy drinks you are considered to be of normal weight.Even if you skip meals you still feel energetic and you can even forget that you have not yet eaten', '2018-03-03 12:36:58'),
(30, 'Normal', 'An ideal normal weight person should be a number that you can get to and maintain without heavy restrictions.When you have a healthy body weight, your current weight should be fairly stable', '2018-03-03 12:42:35'),
(31, 'Normal', 'Exercise regulary to mantain your weight and to build more muscle than fat.Indoor exercises such as squarts,lunges wall sit-ups and also mountain climbers.Not only do they help you tone up your body but they also help burn those extra little calories.', '2018-03-03 12:46:48'),
(32, 'Normal', 'Set reasonable limits on the amount of time you spend watching TV, playing video games, and using computers, phones, and tablets not related to school work..', '2018-03-03 12:49:34'),
(33, 'Normal', 'Watch out for portion distortion. Big portions pile on extra calories that cause weight gain. Sugary beverages, such as sodas, juice drinks, and sports drinks, are empty calories that also contribute to obesity. So choose smaller portions (or share restaurant portions) and go for water or low-fat milk instead of soda.', '2018-03-03 12:50:16'),
(34, 'Normal', 'Don\'t skip breakfast. Breakfast kickstarts your metabolism, burning calories from the get-go and giving you energy to do more during the day. People who skip breakfast often feel so hungry that they eat more later on.', '2018-03-03 12:51:16'),
(35, 'Normal', 'Water therapy is of great use to mantain weight it helps to flush out toxins quicker and also helps to keep the digestive system busy.Take a glass of water thirty minutes before and after a meal.', '2018-03-03 12:54:44'),
(36, 'Normal', 'Avoid taking water with you meals this solidifies the fats you are consuming and in a way slowing down your meals.', '2018-03-03 12:57:12'),
(37, 'Normal', 'Don\'t deprive yourself.Not eating enough calories in a day is a one-way ticket to overeating later in the week. You may have been on a strict diet that limited the amount of calories you consumed, but it will be next to impossible to maintain that level of commitment now that you\'ve reached your goal weight.', '2018-03-03 12:58:24'),
(38, 'Normal', 'Focus on whole foods.Trade packaged meals for more whole foods if you want to maintain a healthy weight. If you\'re not inspired, take a trip to your local farmers market to see the fresh bounty that\'s available â€“ likely much more appealing and colorful than what\'s in those boxes at your grocery store.', '2018-03-03 13:00:21'),
(39, 'Normal', 'Plan your meals in advance. A maintenance diet has a lot of the same components as a weight-loss diet. Having a meal-by-meal plan that you can stick to, although it has more calories than your diet plan did, can act as a guide to keep you on track.', '2018-03-03 13:01:50'),
(40, 'Normal', 'Keep a ahealthy journal:People who are successful at maintaining their weight monitor their progress and step on the scale regularly.[19] If you note that your weight has gone up or down, you can take steps to remedy it, such as increasing or decreasing portion sizes or modifying your exercise routine. ', '2018-03-03 13:07:14'),
(41, 'Normal', 'Get enough rest. On average, the less people sleep, the more they weigh.[21] Sleeping enough hours per night is an easy way to maintain your ideal weight, while also being a key part of an overall healthy lifestyle', '2018-03-03 13:11:07'),
(42, 'Normal', 'Follow a consistent diet. Eating the same types of food each day is better than eating more on weekends, holidays, or other special occasions.Donâ€™t skip meals. This can slow down your metabolism and youâ€™ll burn fewer calories at rest.Donâ€™t skip meals. This can slow down your metabolism and youâ€™ll burn fewer calories at rest', '2018-03-03 13:12:22'),
(43, 'Underweight', 'Hair loss. Low body weight can cause hair to thin and fall out easily. It also can cause dry, thin skin and health issues with teeth and gums. Spinach is a great source of iron, vitamin A and C and protein. Iron deficiency is the main cause of hair fall and spinach is not only iron-rich, it also contains sebum which acts as a natural conditioner for hair. It also provides us with omega-3 acid, magnesium, potassium, calcium and iron. These help in maintaining a healthy scalp and lustrous hair.', '2018-03-03 13:24:38'),
(44, 'Underweight', 'Carrots and Sweet Potatoes: Sneak carrots in your diet for those long and lustrous locks. Known to be good for the eyes, carrots contain Vitamin A that also improves hair growth.', '2018-03-03 13:26:23'),
(45, 'Underweight', ' Dairy products are also a great source of biotin (Vitamin B7) that is known to fight hair loss.  Milk, yogurt, cheese, eggs etc. are loaded with essential nutrients such as proteins, Vitamin B12, iron, zinc and Omega 6 fatty acids.', '2018-03-03 13:28:33'),
(46, 'Underweight', 'Anemia. T\r\n\r\n\r\n\r\nAnaemia this is a condition can be caused by not having enough of the vitamins iron, folate, and B12. This can cause dizziness, fatigue, and headaches.Eating foods high in iron can help prevent foods such as meat,chicken,turkey or pork', '2018-03-03 13:32:33'),
(47, 'Overweight', 'Gallstones the incidence of gallstones is significantly higher in those who are obese. A high-fiber, low-fat diet helps keep bile cholesterol in liquid form. However, don\'t cut out fats abruptly or eliminate them altogether, as too little fat can also result in gallstone formation.', '2018-03-03 13:36:43'),
(48, 'Overweight', 'Studies suggest that moderate consumption of alcohol and coffee may actually prevent gallstones.', '2018-03-03 13:38:05'),
(49, 'Overweight', 'Exercise getting regular exercise can help you keep your weight down, which may prevent gallstones but this is a more indirect approach', '2018-03-03 13:39:10'),
(50, 'Overweight', ' There are lots of reasons to eat these wonder foods, and here\'s one more: Consuming lots of fruits and vegetables may prevent gallstones', '2018-03-03 13:40:05'),
(51, 'Overweight', 'Menstrual Problems being overweight may cause a girl to reach puberty at an earlier age. Also, obesity may contribute to uterine fibroids or menstrual irregularities later in life.', '2018-03-03 13:41:57'),
(52, 'Overweight', 'High-Fat, Processed Meats. High-fat, processed meats are some of the worst food choices for women when it comes to fibroids. Foods high in unhealthy fats, like non-organic/processed meats or trans-fats (think hamburgers and processed breakfast sausages), can increase inflammation levels. Processed foods also often contain chemical additives and other ingredients that promote inflammation.', '2018-03-03 13:43:56'),
(53, 'Overweight', 'Cruciferous Vegetables. Cruciferous vegetables support detoxification of your liver and may help balance estrogen levels. Research has shown that high consumption of broccoli, cabbage,', '2018-03-03 13:44:58'),
(54, 'Overweight', 'Flaxseeds can help balance estrogen levels in the body, which can in turn work to shrink fibroids. You should aim for at least 2 tablespoons per day if you already have fibroids.', '2018-03-03 13:46:09'),
(55, 'Overweight', 'Whole Grains. Instead of eating refined grains, opt for healthier whole grains like millet, spelt, brown rice, buckwheat, rye and oats. These are higher in fiber, contain more minerals and tend to be much less processed.', '2018-03-03 13:46:44'),
(56, 'Overweight', 'Sip on Herbal teas may help soothe symptoms by decreasing inflammation and rebalancing certain hormones. Teas made with chasteberry, milk thistle, yellow dock, dandelion root, nettle and red raspberry all have systemic benefits for the uterus and reproductive system.', '2018-03-03 13:47:59'),
(57, 'Overweight', 'Beans and Lentils.Legumes, such as beans and lentils, are top fiber sources, making them prime choices for weight control. They also have a low glycemic index, or a mild impact on your blood sugar.', '2018-03-03 13:50:06'),
(58, 'Overweight', 'For soy, which also offers a lean protein alternative to fatty meats, consume soy milk, tofu or edamame -- steamed, podded soybeans. Add ground flaxseeds to smoothies, yogurt and cereals', '2018-03-03 13:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `created`) VALUES
(1, 'New advice added', '2016-12-18 00:00:13'),
(2, 'New advice added', '2016-12-18 00:22:37'),
(3, 'New system user was added.', '2016-12-18 00:37:27'),
(4, '0773553312 logged in', '2018-03-15 16:57:57'),
(5, '0773553311 logged in', '2018-03-25 16:35:00'),
(6, '0773553311 logged in', '2018-03-25 16:35:05'),
(7, '0773553310 logged in', '2018-03-25 16:35:10'),
(8, '0773553312 logged in', '2018-03-25 16:38:15'),
(9, 'New activity added', '2018-03-25 16:59:48'),
(10, 'Advice updated', '2018-03-25 17:31:54'),
(11, 'New activity added', '2018-03-25 17:36:02'),
(12, 'Advice deleted', '2018-03-25 17:36:09'),
(13, '0773553312 logged in', '2018-03-27 16:42:27'),
(14, 'New activity added', '2018-03-27 20:09:12'),
(15, '0773553312 logged in', '2018-04-04 07:52:41'),
(16, 'New activity added', '2018-04-04 09:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(510) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `name`, `logo`) VALUES
(1, 'Diabetes Monitoring System', 'assets/uploads/ahhh.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `phone`, `created`) VALUES
(1, 'ggggg', 'vbvvvnmnh', '6667888633', '0000-00-00 00:00:00'),
(2, 'Delon Savanhu', 'delontakesure', '0773553310', '2016-12-18 12:53:09'),
(3, 'Tinaye', 'bdhshsjshs', '07746672847', '2016-12-18 13:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_disease`
--

CREATE TABLE `user_disease` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_disease`
--
ALTER TABLE `user_disease`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
