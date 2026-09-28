-- Run this against your EXISTING myhmsdb database (the one you already set up).
-- It does NOT delete any data -- it only adds a primary key to doctb and
-- enforces uniqueness on the fields used to log in / identify a record.
--
-- If any ALTER below fails with a "Duplicate entry" error, it means you
-- already have two rows sharing that email/username. Fix or remove one of
-- them first, then re-run this file.

-- 1. Give doctb a real primary key, so records can be deleted/edited by ID
--    instead of by email.
ALTER TABLE `doctb` ADD COLUMN `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;

-- 2. Enforce uniqueness only on the identifying fields -- not name, spec, or fees.
ALTER TABLE `doctb`   ADD UNIQUE KEY `uniq_doctb_email`   (`email`);
ALTER TABLE `doctb`   ADD UNIQUE KEY `uniq_doctb_username` (`username`);
ALTER TABLE `patreg`  ADD UNIQUE KEY `uniq_patreg_email`  (`email`);
