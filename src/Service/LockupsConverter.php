<?php

namespace App\Service;

class LockupsConverter 
{
    public function generateFiles($prefix, $suffix, $orient, $color, $rev, $height = 200, $width = 80) {
		$starting_svg = $this->getStartingSVGPath();
		$new_ai = \Core::ROOT . '/tmp/' . $prefix . $this->getOrganizationFilename() . $suffix . $this->id . '.ai';
		$new_pdf = \Core::ROOT . '/tmp/' . $prefix . $this->getOrganizationFilename() . $suffix . $this->id . '.pdf';
		$new_svg = \Core::ROOT . '/tmp/' . $prefix . $this->getOrganizationFilename() . $suffix . $this->id . '.svg';
		$new_png = \Core::ROOT . '/tmp/' . $prefix . $this->getOrganizationFilename() . $suffix . $this->id . '.png';
		$new_jpg = \Core::ROOT . '/tmp/' . $prefix . $this->getOrganizationFilename() . $suffix . $this->id . '.jpg';
		$new_eps = \Core::ROOT . '/tmp/' . $prefix . $this->getOrganizationFilename() . $suffix . $this->id . '.eps';

		$backend_output = array();
		$frontend_output = array();

		$return_var = NULL;

		exec('inkscape -h800 --export-png=' . $new_png . ' ' . $starting_svg . ' 2>&1', $backend_output, $return_var);
		if ($return_var == 0) {
			# attempt to write this to the DB
			$file = fopen($new_png, 'r');
			LockupFile::create(array(
				'lockup_id' => $this->id,
				'type' => 'png',
				'orientation' => $orient,
				'color' => $color,
				'reverse' => $rev,
				'data' => fread($file, filesize($new_png))
			));
			fclose($file);

			$bg = $rev ? '-background "#000000" -flatten ' : '-background "#ffffff" -flatten ';
			exec('convert ' . $bg . $new_png . ' ' . $new_jpg . ' 2>&1', $backend_output, $return_var);
			LockupFile::create(array(
				'lockup_id' => $this->id,
				'type' => 'jpg',
				'orientation' => $orient,
				'color' => $color,
				'reverse' => $rev,
				'data' => file_get_contents($new_jpg)
			));

			$frontend_output[] = '200px PNG/JPG created.';
		} else {
			$frontend_output[] = 'Error creating 200px PNG/JPG.';
		}
		
		exec('inkscape -C -h' . $height . ' -w' . $width . ' --export-eps=' . $new_eps . ' ' . $starting_svg . ' 2>&1', $backend_output, $return_var);
		if ($return_var == 0) {

			# POSSIBLE FIX: replace the rgb colors in teh cairo commands with cmyk here (for both 4c and Pantone?)
			if ($color == '4c' || $color == 'pms186cp') {
				$file = fopen($new_eps, 'r');
				$data = fread($file, filesize($new_eps));
				$data = str_replace('setrgbcolor', 'setcmykcolor', $data); # changes the rg cairo command to setcmykcolor
				$data = str_replace('0.0705882 0.603922 0.388235 rg' , '0.83 0.15 0.80 0.02 rg', $data); # replaces green of 4H
				$data = str_replace('0.854902 0.101961 0.196078 rg', '0.02 1 0.85 0.06 rg', $data); # replaces scarlet red
				fclose($file);

				$file = fopen($new_eps, 'w');
				fwrite($file, $data);
				fclose($file);
			}

			# attempt to write this to the DB
			$file = fopen($new_eps, 'r');
			LockupFile::create(array(
				'lockup_id' => $this->id,
				'type' => 'eps',
				'orientation' => $orient,
				'color' => $color,
				'reverse' => $rev,
				'data' => fread($file, filesize($new_eps))
			));
			fclose($file);

			$file = fopen($new_eps, 'r');
			LockupFile::create(array(
				'lockup_id' => $this->id,
				'type' => 'ai',
				'orientation' => $orient,
				'color' => $color,
				'reverse' => $rev,
				'data' => fread($file, filesize($new_eps))
			));
			fclose($file);

			$frontend_output[] = 'EPS/AI created.';
		} else {
			$frontend_output[] = 'Error creating EPS/AI.';
		}

		$options = '';
		if ($color == '4c') {
			$options = '-dProcessColorModel=/DeviceCMYK ';
		}
		exec('ps2pdf ' . $options . $new_eps . ' ' . $new_pdf . ' 2>&1', $backend_output, $return_var);
		if ($return_var == 0) {
			# attempt to write this to the DB
			$file = fopen($new_pdf, 'r');
			LockupFile::create(array(
				'lockup_id' => $this->id,
				'type' => 'pdf',
				'orientation' => $orient,
				'color' => $color,
				'reverse' => $rev,
				'data' => fread($file, filesize($new_pdf))
			));
			fclose($file);

			$frontend_output[] = 'PDF created.';
		} else {
			$frontend_output[] = 'Error creating PDF.';
		}

		exec('inkscape -h' . $height . ' -w' . $width . ' --export-plain-svg=' . $new_svg . ' ' . $starting_svg . ' 2>&1', $backend_output, $return_var);
		if ($return_var == 0) {
			# attempt to write this to the DB
			$file = fopen($new_svg, 'r');
			LockupFile::create(array(
				'lockup_id' => $this->id,
				'type' => 'svg',
				'orientation' => $orient,
				'color' => $color,
				'reverse' => $rev,
				'data' => fread($file, filesize($new_svg))
			));
			fclose($file);

			$frontend_output[] = 'SVG created.';
		} else {
			$frontend_output[] = 'Error creating SVG.';
		}

		# cleanup these files
		$this->removeFile($new_jpg);
		$this->removeFile($new_pdf);
		$this->removeFile($new_png);
		$this->removeFile($new_eps);
		$this->removeFile($new_svg);

		return $frontend_output;
	}

	private function removeFile($file) {
		if (file_exists($file)) {
			unlink($file);
		}
	}

}