<?php
function renderForm($action, $method, $fields, $buttonText = "Submit") {
    ?>
    <form action="<?php echo htmlspecialchars($action); ?>" method="<?php echo htmlspecialchars($method); ?>" style="max-width: 400px; margin: auto;">
        <?php foreach ($fields as $field): ?>
            <div style="margin-bottom: 15px;">
                <label for="<?php echo htmlspecialchars($field['name']); ?>">
                    <?php echo htmlspecialchars($field['label']); ?>
                </label>
                <input 
                    type="<?php echo htmlspecialchars($field['type']); ?>" 
                    name="<?php echo htmlspecialchars($field['name']); ?>" 
                    id="<?php echo htmlspecialchars($field['name']); ?>" 
                    value="<?php echo htmlspecialchars($field['value'] ?? ''); ?>" 
                    style="width: 100%; padding: 8px; margin-top: 5px;" 
                    <?php echo isset($field['required']) && $field['required'] ? 'required' : ''; ?>
                />
            </div>
        <?php endforeach; ?>
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">
            <?php echo htmlspecialchars($buttonText); ?>
        </button>
    </form>
    <?php
}
?>
