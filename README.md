# Workspace preview test extension

This extension is designed to test a bug when trying to combine the
backend preview feature of TYPO3 with the workspaces preview.

## Setup

Create a page and place the preview plugin on it.

On the root page of your site, add the following Page TSconfig:

```typo3_typoscript
options.workspaces.previewPageId = xxx
TCEMAIN.preview {
    tx_workspaceextensiontest_foo {
		previewPageId = xxx
		fieldToParameterMap {
			uid = tx_workspacepreviewtest_preview[uid]
		}
		additionalGetParameters {
            tx_workspacepreviewtest_preview.table = tx_workspaceextensiontest_foo
		}
	}
    tx_workspaceextensiontest_bar {
		previewPageId = xxx
		fieldToParameterMap {
			uid = tx_workspacepreviewtest_preview[uid]
		}
		additionalGetParameters {
            tx_workspacepreviewtest_preview.table = tx_workspaceextensiontest_bar
		}
	}
}
```

where `xxx` is the uid of the page where the preview plugin resides.

Create a folder page and create at least one record from each test table. Test the preview.

Create one workspace and modify the test table records. Test the preview.
